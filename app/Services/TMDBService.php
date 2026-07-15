<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TMDBService
{
    protected $baseUrl;
    protected $token;

    public function __construct()
    {
        $this->baseUrl = config('tmdb.base_url');
        $this->token = config('tmdb.token');
    }

    protected function client()
    {
        return Http::withToken($this->token)->baseUrl($this->baseUrl);
    }

    public function getTrendingMovies()
    {
        return $this->client()->get('/trending/movie/day')->json('results');
    }

    public function getPopularMovies()
    {
        return $this->client()->get('/movie/popular')->json('results');
    }

    public function getTopRatedMovies()
    {
        return $this->client()->get('/movie/top_rated')->json('results');
    }

    public function getUpcomingMovies()
    {
        return $this->client()->get('/movie/upcoming')->json('results');
    }

    public function searchMovie($query)
    {
        return $this->client()->get('/search/movie', [
            'query' => $query
        ])->json('results');
    }

    public function getMovieDetails($id)
    {
        return $this->client()->get("/movie/{$id}", [
            'append_to_response' => 'credits,videos'
        ])->json();
    }
}
