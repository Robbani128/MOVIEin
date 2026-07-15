<x-app-layout>
    <div class="hero-section" style="background-image: url('https://image.tmdb.org/t/p/original{{ $trendingMovies->first()['backdrop_path'] ?? '' }}');">
        <div class="hero-overlay px-5">
            <div class="container text-white mt-5">
                <h1 class="hero-title">{{ $trendingMovies->first()['title'] ?? 'Welcome to MOVIEin' }}</h1>
                <p class="lead mb-4 w-50 d-none d-md-block text-light" style="font-size: 1.15rem; font-weight: 400; text-shadow: 1px 1px 2px rgba(0,0,0,0.8);">{{ $trendingMovies->first()['overview'] ?? 'Discover, track, and review your favorite movies.' }}</p>
                <div class="d-flex gap-3 mt-4">
                    <a href="{{ isset($trendingMovies->first()['id']) ? route('movies.show', $trendingMovies->first()['id']) : '#' }}" class="btn btn-primary btn-lg"><i class="fas fa-play me-2"></i> Play Now</a>
                    <a href="#trending" class="btn btn-outline-light btn-lg" style="border-radius: 50rem;"><i class="fas fa-info-circle me-2"></i> More Info</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5" id="trending">
        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 fw-bold border-start border-4 border-primary ps-3">Trending Movies</h2>
            </div>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
                @foreach($trendingMovies as $movie)
                    <div class="col">
                        <x-movie-card :movie="$movie" />
                    </div>
                @endforeach
            </div>
        </section>

        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 fw-bold border-start border-4 border-primary ps-3">Popular Movies</h2>
            </div>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
                @foreach($popularMovies as $movie)
                    <div class="col">
                        <x-movie-card :movie="$movie" />
                    </div>
                @endforeach
            </div>
        </section>

        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 fw-bold border-start border-4 border-primary ps-3">Top Rated Movies</h2>
            </div>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
                @foreach($topRatedMovies as $movie)
                    <div class="col">
                        <x-movie-card :movie="$movie" />
                    </div>
                @endforeach
            </div>
        </section>

        <section>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 fw-bold border-start border-4 border-primary ps-3">Upcoming Movies</h2>
            </div>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
                @foreach($upcomingMovies as $movie)
                    <div class="col">
                        <x-movie-card :movie="$movie" />
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>
