<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Favorite;
use App\Services\TMDBService;

class WishlistController extends Controller
{
    public function index(TMDBService $tmdbService)
    {
        $favorites = Favorite::where('user_id', auth()->id())->latest()->get();
        
        $movies = $favorites->map(function ($favorite) use ($tmdbService) {
            $movie = $tmdbService->getMovieDetails($favorite->movie_id);
            if (isset($movie['success']) && $movie['success'] === false) {
                return null;
            }
            $movie['favorite_id'] = $favorite->id;
            return $movie;
        })->filter();

        return view('wishlist.index', compact('movies'));
    }

    public function store(Request $request, $id)
    {
        Favorite::firstOrCreate([
            'user_id' => auth()->id(),
            'movie_id' => $id
        ]);

        return back()->with('success', 'Movie added to your wishlist!');
    }

    public function destroy($id)
    {
        Favorite::where('user_id', auth()->id())->where('movie_id', $id)->delete();
        
        return back()->with('success', 'Movie removed from your wishlist!');
    }
}
