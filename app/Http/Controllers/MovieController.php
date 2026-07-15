<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\TMDBService;

class MovieController extends Controller
{
    protected $tmdbService;

    public function __construct(TMDBService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function show($id)
    {
        $movie = $this->tmdbService->getMovieDetails($id);
        
        if (isset($movie['success']) && $movie['success'] === false) {
            abort(404);
        }

        $isFavorite = false;
        $isWatched = false;
        $userRating = null;
        $userReview = null;

        if (auth()->check()) {
            $userId = auth()->id();
            $isFavorite = \App\Models\Favorite::where('user_id', $userId)->where('movie_id', $id)->exists();
            $isWatched = \App\Models\WatchHistory::where('user_id', $userId)->where('movie_id', $id)->exists();
            $userRating = \App\Models\Rating::where('user_id', $userId)->where('movie_id', $id)->first();
            $userReview = \App\Models\Review::where('user_id', $userId)->where('movie_id', $id)->first();
        }

        // Fetch all reviews for this movie
        $reviews = \App\Models\Review::with('user')->where('movie_id', $id)->latest()->get();

        return view('movies.show', compact('movie', 'isFavorite', 'isWatched', 'userRating', 'userReview', 'reviews'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $movies = [];

        if ($query) {
            $movies = $this->tmdbService->searchMovie($query);
        }

        return view('movies.search', compact('movies', 'query'));
    }
}
