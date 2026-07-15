<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'review' => 'required|string|max:1000'
        ]);

        Review::updateOrCreate(
            ['user_id' => auth()->id(), 'movie_id' => $id],
            ['review' => $request->review]
        );

        return back()->with('success', 'Review submitted successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'review' => 'required|string|max:1000'
        ]);

        $review = Review::where('user_id', auth()->id())->findOrFail($id);
        $review->update(['review' => $request->review]);

        return back()->with('success', 'Review updated successfully!');
    }

    public function destroy($id)
    {
        Review::where('user_id', auth()->id())->findOrFail($id)->delete();
        return back()->with('success', 'Review deleted successfully!');
    }
}
