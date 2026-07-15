<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rating;

class RatingController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:10'
        ]);

        Rating::updateOrCreate(
            ['user_id' => auth()->id(), 'movie_id' => $id],
            ['rating' => $request->rating]
        );

        return back()->with('success', 'Rating submitted successfully!');
    }
}
