<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;

class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        $apiKey = env('TMDB_API_KEY');
        $response = Http::get("https://api.themoviedb.org/3/movie/popular?api_key={$apiKey}&language=en-US&page=1");
        $movies = $response->json()['results'];

        foreach ($movies as $movie) {
            // Lấy thông tin chi tiết cho từng bộ phim
            $details = $this->fetchMovieDetails($movie['id']);

            Movie::updateOrCreate(
                ['movie_id' => $movie['id']],
                $details
            );
        }
    }

    protected function fetchMovieDetails($movieId)
    {
        $apiKey = env('TMDB_API_KEY');
        
        $movieResponse = Http::get("https://api.themoviedb.org/3/movie/{$movieId}?api_key={$apiKey}&language=en-US");
        $movieData = $movieResponse->json();
        
        $creditsResponse = Http::get("https://api.themoviedb.org/3/movie/{$movieId}/credits?api_key={$apiKey}&language=en-US");
        $creditsData = $creditsResponse->json();
        
        $actors = array_map(function ($actor) {
            return $actor['name'];
        }, $creditsData['cast']);
        
        $director = array_filter($creditsData['crew'], function ($crewMember) {
            return $crewMember['job'] === 'Director';
        });
        $director = !empty($director) ? reset($director)['name'] : '';
        
        return [
            'title' => $movieData['title'],
            'description' => $movieData['overview'],
            'director' => $director,
            'actors' => implode(', ', $actors),
            'genre' => implode(', ', array_column($movieData['genres'], 'name')),
            'release_date' => $movieData['release_date'],
            'poster' => $movieData['poster_path'],
            'status' => 'now showing', // Hoặc tính toán trạng thái
        ];
    }
}
