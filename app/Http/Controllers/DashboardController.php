<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Favorite;
use App\Models\Review;
use App\Models\WatchHistory;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        
        $totalWishlist = Favorite::where('user_id', $userId)->count();
        $totalReviews = Review::where('user_id', $userId)->count();
        $totalWatched = WatchHistory::where('user_id', $userId)->count();

        return view('dashboard', compact('totalWishlist', 'totalReviews', 'totalWatched'));
    }
}
