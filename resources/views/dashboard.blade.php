<x-app-layout>
    <div class="container py-5">
        <h2 class="h3 fw-bold border-start border-4 border-primary ps-3 mb-4">My Dashboard</h2>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-center bg-dark border-secondary h-100">
                    <div class="card-body py-5">
                        <i class="fas fa-heart fa-3x text-danger mb-3"></i>
                        <h5 class="card-title text-muted">Total Wishlist</h5>
                        <h2 class="display-4 fw-bold">{{ $totalWishlist }}</h2>
                        <a href="{{ route('wishlist.index') }}" class="btn btn-outline-danger mt-3">View Wishlist</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card text-center bg-dark border-secondary h-100">
                    <div class="card-body py-5">
                        <i class="fas fa-history fa-3x text-success mb-3"></i>
                        <h5 class="card-title text-muted">Movies Watched</h5>
                        <h2 class="display-4 fw-bold">{{ $totalWatched }}</h2>
                        <a href="{{ route('history.index') }}" class="btn btn-outline-success mt-3">View History</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center bg-dark border-secondary h-100">
                    <div class="card-body py-5">
                        <i class="fas fa-comment-alt fa-3x text-primary mb-3"></i>
                        <h5 class="card-title text-muted">Total Reviews</h5>
                        <h2 class="display-4 fw-bold">{{ $totalReviews }}</h2>
                        <a href="#" class="btn btn-outline-primary mt-3 disabled">Manage Reviews</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <div class="card bg-dark border-secondary">
                <div class="card-header border-secondary bg-transparent d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Profile Information</h5>
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-outline-light">Edit Profile</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 text-muted">Name</div>
                        <div class="col-sm-9">{{ Auth::user()->name }}</div>
                    </div>
                    <hr class="border-secondary">
                    <div class="row">
                        <div class="col-sm-3 text-muted">Email</div>
                        <div class="col-sm-9">{{ Auth::user()->email }}</div>
                    </div>
                    <hr class="border-secondary">
                    <div class="row">
                        <div class="col-sm-3 text-muted">Joined Date</div>
                        <div class="col-sm-9">{{ Auth::user()->created_at->format('F d, Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
