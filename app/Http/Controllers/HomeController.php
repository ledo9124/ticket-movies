<?php

namespace App\Http\Controllers;

use App\Services\TMDbService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    protected $tmdbService;

    public function __construct(TMDbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }
    public function index()
    {
        $movies = $this->tmdbService->getPopularMovies();
        // dd($movies);
        foreach ($movies["results"] as &$movie) {
            $movie["vote_average"] = round($movie["vote_average"] * 10);
            $movie["release_date"] = Carbon::parse($movie["release_date"])->format('M d, Y');
        }
        return view('client.pages.home', compact('movies'));
    }

    public function movieGrid(Request $request)
    {
        $page = $request->query('page', 1);
        $perPage = 12; // Số lượng phim mỗi trang
        $movies = $this->tmdbService->getListMovies();

        // Đảm bảo rằng movies["results"] không bị trống
        if (empty($movies["results"])) {
            return view('client.pages.movie-grid', ['paginator' => new LengthAwarePaginator([], 0, $perPage, $page, ['path' => url('movies')])]);
        }

        foreach ($movies["results"] as &$movie) {
            $movie["vote_average"] = round($movie["vote_average"] * 10);
            $movie["release_date"] = Carbon::parse($movie["release_date"])->format('M d, Y');
        }

        // Lấy dữ liệu phim cho trang hiện tại
        $currentPageResults = array_slice($movies["results"], ($page - 1) * $perPage, $perPage);
        // Tạo đối tượng phân trang
        $paginator = new LengthAwarePaginator(
            $currentPageResults,
            20,
            $perPage,
            $page,
            ['path' => url('movies')]
        );
        // dd($paginator);
        return view('client.pages.movie-grid', compact('paginator'));
    }

    public function movieDetail($id)
    {
        // Lấy chi tiết phim từ TMDbService hoặc database
        $movie = $this->tmdbService->getMovieById($id);

        $trailer = $this->tmdbService->getTrailer($id);
        // dd($movie);
        // Trả view với dữ liệu phim
        return view('client.pages.movie-detail', ['movie' => $movie, 'trailer' => $trailer]);
    }
}
