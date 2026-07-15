<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\TMDBService;

class HomeController extends Controller
{
    protected $tmdbService;

    public function __construct(TMDBService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function index()
    {
        $trendingMovies = collect($this->tmdbService->getTrendingMovies())->take(10);
        $popularMovies = collect($this->tmdbService->getPopularMovies())->take(10);
        $topRatedMovies = collect($this->tmdbService->getTopRatedMovies())->take(10);
        $upcomingMovies = collect($this->tmdbService->getUpcomingMovies())->take(10);

        return view('home', compact(
            'trendingMovies',
            'popularMovies',
            'topRatedMovies',
            'upcomingMovies'
        ));
    }
}
