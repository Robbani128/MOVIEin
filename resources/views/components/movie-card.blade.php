@props(['movie'])

<div class="movie-card">
    <a href="{{ route('movies.show', $movie['id']) }}" class="text-decoration-none text-white d-block h-100">
        <div class="card-img-wrapper">
            @if(isset($movie['poster_path']) && $movie['poster_path'])
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] ?? 'Movie Poster' }}" loading="lazy">
            @else
                <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 340px;">
                    <span>No Poster</span>
                </div>
            @endif
            <div class="play-overlay">
                <i class="far fa-play-circle"></i>
            </div>
        </div>
        <div class="card-body">
            <h5 class="movie-title" title="{{ $movie['title'] ?? 'Unknown' }}">{{ $movie['title'] ?? 'Unknown Title' }}</h5>
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-warning fw-bold"><i class="fas fa-star me-1"></i>{{ number_format($movie['vote_average'] ?? 0, 1) }}</small>
                <small class="text-muted">{{ isset($movie['release_date']) ? date('Y', strtotime($movie['release_date'])) : 'N/A' }}</small>
            </div>
        </div>
    </a>
</div>
