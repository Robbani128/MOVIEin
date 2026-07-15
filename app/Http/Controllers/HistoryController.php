<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WatchHistory;
use App\Services\TMDBService;

class HistoryController extends Controller
{
    public function index(TMDBService $tmdbService)
    {
        $histories = WatchHistory::where('user_id', auth()->id())->latest('watched_at')->get();
        
        $movies = $histories->map(function ($history) use ($tmdbService) {
            $movie = $tmdbService->getMovieDetails($history->movie_id);
            if (isset($movie['success']) && $movie['success'] === false) {
                return null;
            }
            $movie['history_id'] = $history->id;
            $movie['watched_at'] = $history->watched_at;
            return $movie;
        })->filter();

        return view('history.index', compact('movies'));
    }

    public function store(Request $request, $id)
    {
        WatchHistory::firstOrCreate([
            'user_id' => auth()->id(),
            'movie_id' => $id
        ]);

        return back()->with('success', 'Movie marked as watched!');
    }
}
