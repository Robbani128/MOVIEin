<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [MovieController::class, 'search'])->name('movies.search');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/{id}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
    Route::post('/history/{id}', [HistoryController::class, 'store'])->name('history.store');

    Route::post('/movie/{id}/rate', [RatingController::class, 'store'])->name('ratings.store');
    
    Route::post('/movie/{id}/review', [ReviewController::class, 'store'])->name('reviews.store');
    Route::put('/review/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
