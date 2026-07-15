<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-bold border-start border-4 border-primary ps-3">My Wishlist</h2>
        </div>
        
        @if($movies->count() > 0)
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
                @foreach($movies as $movie)
                    <div class="col position-relative">
                        <x-movie-card :movie="$movie" />
                        <form action="{{ route('wishlist.destroy', $movie['id']) }}" method="POST" class="position-absolute top-0 end-0 m-2 delete-form" style="z-index: 10;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-circle shadow" title="Remove from wishlist"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-secondary text-center py-5">
                <i class="fas fa-heart fa-3x mb-3 text-muted"></i>
                <h4>Your wishlist is empty</h4>
                <p>Start discovering movies and add them to your wishlist.</p>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3">Discover Movies</a>
            </div>
        @endif
    </div>
</x-app-layout>
