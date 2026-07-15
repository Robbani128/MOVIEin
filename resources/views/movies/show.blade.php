<x-app-layout>
    <div class="movie-backdrop" style="margin-top: -76px; padding-top: 76px; background-image: linear-gradient(to right, rgba(11,12,16,1) 150px, rgba(11,12,16,0.85) 100%), url('https://image.tmdb.org/t/p/original{{ $movie['backdrop_path'] }}'); background-size: cover; background-position: center top; min-height: 600px; display: flex; align-items: center; padding-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0 text-center text-md-start">
                    @if($movie['poster_path'])
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="img-fluid rounded shadow-lg" style="max-height: 500px;">
                    @else
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center mx-auto mx-md-0" style="height: 500px; width: 330px;">
                            <span>No Poster</span>
                        </div>
                    @endif
                </div>
                <div class="col-md-8 text-white">
                    <h1 class="display-4 fw-bold">{{ $movie['title'] }} <span class="text-muted fs-3">({{ date('Y', strtotime($movie['release_date'])) }})</span></h1>
                    
                    <div class="d-flex align-items-center mb-3">
                        <span class="badge bg-primary fs-6 me-2"><i class="fas fa-star text-warning"></i> {{ number_format($movie['vote_average'], 1) }}</span>
                        <span class="text-muted me-3"><i class="fas fa-clock me-1"></i> {{ $movie['runtime'] }} min</span>
                        <div class="text-muted">
                            @foreach($movie['genres'] as $genre)
                                <span class="badge bg-secondary">{{ $genre['name'] }}</span>
                            @endforeach
                        </div>
                    </div>

                    <h5 class="fw-bold mt-4">Overview</h5>
                    <p class="lead" style="font-size: 1.1rem;">{{ $movie['overview'] }}</p>

                    @auth
                    <div class="mt-4 d-flex gap-2 flex-wrap">
                        @if($isFavorite)
                            <form action="{{ route('wishlist.destroy', $movie['id']) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger"><i class="fas fa-heart text-danger"></i> Remove from Wishlist</button>
                            </form>
                        @else
                            <form action="{{ route('wishlist.store', $movie['id']) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-primary"><i class="far fa-heart"></i> Add to Wishlist</button>
                            </form>
                        @endif

                        @if(!$isWatched)
                            <form action="{{ route('history.store', $movie['id']) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success"><i class="fas fa-check"></i> Mark as Watched</button>
                            </form>
                        @else
                            <button class="btn btn-success disabled"><i class="fas fa-check-double"></i> Watched</button>
                        @endif
                        
                        <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#ratingModal"><i class="fas fa-star"></i> Rate</button>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-8">
                <h3 class="border-start border-4 border-primary ps-3 mb-4">Cast</h3>
                <div class="d-flex overflow-auto pb-3" style="gap: 15px;">
                    @foreach(array_slice($movie['credits']['cast'] ?? [], 0, 10) as $cast)
                        <div class="text-center" style="min-width: 120px;">
                            @if($cast['profile_path'])
                                <img src="https://image.tmdb.org/t/p/w185{{ $cast['profile_path'] }}" alt="{{ $cast['name'] }}" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                                <div class="rounded-circle bg-secondary mb-2 mx-auto d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                            @endif
                            <h6 class="mb-0">{{ $cast['name'] }}</h6>
                            <small class="text-muted">{{ $cast['character'] }}</small>
                        </div>
                    @endforeach
                </div>

                <hr class="border-secondary my-5">

                <h3 class="border-start border-4 border-primary ps-3 mb-4">Reviews</h3>
                
                @auth
                    <div class="card bg-dark border-secondary mb-4">
                        <div class="card-body">
                            <form action="{{ $userReview ? route('reviews.update', $userReview->id) : route('reviews.store', $movie['id']) }}" method="POST">
                                @csrf
                                @if($userReview) @method('PUT') @endif
                                <div class="mb-3">
                                    <label class="form-label">Write your review</label>
                                    <textarea name="review" rows="3" class="form-control text-white" required>{{ $userReview->review ?? '' }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ $userReview ? 'Update Review' : 'Submit Review' }}</button>
                                
                                @if($userReview)
                                    <button type="button" class="btn btn-outline-danger ms-2" onclick="document.getElementById('deleteReviewForm').submit();">Delete</button>
                                @endif
                            </form>
                            @if($userReview)
                                <form id="deleteReviewForm" action="{{ route('reviews.destroy', $userReview->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="alert alert-secondary">
                        Please <a href="{{ route('login') }}" class="text-primary">log in</a> to write a review.
                    </div>
                @endauth

                @foreach($reviews as $review)
                    <div class="card bg-dark border-secondary mb-3">
                        <div class="card-body">
                            <h6 class="fw-bold text-primary">{{ $review->user->name }} <span class="text-muted fw-normal ms-2 text-sm">{{ $review->created_at->diffForHumans() }}</span></h6>
                            <p class="mb-0">{{ $review->review }}</p>
                        </div>
                    </div>
                @endforeach
                @if($reviews->isEmpty())
                    <p class="text-muted">No reviews yet. Be the first to review!</p>
                @endif
            </div>

            <div class="col-md-4">
                <h3 class="border-start border-4 border-primary ps-3 mb-4">Trailer</h3>
                @php
                    $trailer = collect($movie['videos']['results'] ?? [])->firstWhere('type', 'Trailer');
                @endphp
                @if($trailer)
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed{{ $trailer['key'] }}" allowfullscreen></iframe>
                    </div>
                @else
                    <div class="alert alert-secondary">No trailer available.</div>
                @endif
            </div>
        </div>
    </div>

    <!-- Rating Modal -->
    @auth
    <div class="modal fade" id="ratingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title">Rate {{ $movie['title'] }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('ratings.store', $movie['id']) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Score (1-10)</label>
                            <input type="number" name="rating" class="form-control" min="1" max="10" value="{{ $userRating->rating ?? '' }}" required>
                        </div>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning text-dark fw-bold">Submit Rating</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endauth
</x-app-layout>
