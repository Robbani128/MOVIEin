<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-bold border-start border-4 border-primary ps-3">Search Results for "{{ $query }}"</h2>
        </div>
        
        @if(count($movies) > 0)
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
                @foreach($movies as $movie)
                    <div class="col">
                        <x-movie-card :movie="$movie" />
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-secondary text-center py-5">
                <i class="fas fa-search fa-3x mb-3 text-muted"></i>
                <h4>No movies found for "{{ $query }}"</h4>
                <p>Try adjusting your search terms.</p>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3">Go Back Home</a>
            </div>
        @endif
    </div>
</x-app-layout>
