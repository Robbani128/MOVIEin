<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-bold border-start border-4 border-primary ps-3">Watch History</h2>
        </div>
        
        @if($movies->count() > 0)
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
                @foreach($movies as $movie)
                    <div class="col">
                        <x-movie-card :movie="$movie" />
                        <div class="text-center mt-2 text-muted small">
                            Watched on {{ \Carbon\Carbon::parse($movie['watched_at'])->format('M d, Y') }}
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-secondary text-center py-5">
                <i class="fas fa-history fa-3x mb-3 text-muted"></i>
                <h4>Your watch history is empty</h4>
                <p>Start tracking the movies you've watched.</p>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3">Discover Movies</a>
            </div>
        @endif
    </div>
</x-app-layout>
