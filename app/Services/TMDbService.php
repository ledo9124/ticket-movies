<?php

namespace App\Services;

use GuzzleHttp\Client;

class TMDbService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.themoviedb.org/3/'
        ]);
        $this->apiKey = env('TMDB_API_KEY');
    }

    public function getPopularMovies()
    {
        $response = $this->client->get('movie/popular', [
            'query' => [
                'api_key' => $this->apiKey
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    // Thêm các phương thức khác để tương tác với API nếu cần
    public function getListMovies()
    {
        $response = $this->client->get('movie/popular', [
            'query' => [
                'api_key' => $this->apiKey
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    public function getMovieById($id)
    {
        $response = $this->client->request('GET', "movie/{$id}", [
            'query' => [
                'api_key' => $this->apiKey,
                'language' => 'en-US', // Thay đổi theo nhu cầu
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    
public function getMovieVideos($movieId) {
    $response = $this->client->request('GET', "movie/{$movieId}/videos", [
        'query' => [
            'api_key' => $this->apiKey,
            'language' => 'en-US',
        ]
    ]);

    return json_decode($response->getBody()->getContents(), true);
}

public function getTrailer($movieId) {
    $videos = $this->getMovieVideos($movieId);
    // dd($videos);
    // Tìm video trailer trong danh sách
    $trailer = null;
    foreach ($videos['results'] as $video) {
        if ($video['type'] === 'Trailer') {
            $trailer = $video;
            break;
        }
    }
    // dd($trailer);    
    return $trailer;
}
}
