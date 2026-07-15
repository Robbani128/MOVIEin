<x-app-layout>
    <div class="container py-5">
        <h2 class="h3 fw-bold border-start border-4 border-primary ps-3 mb-4">Edit Profile</h2>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card bg-dark border-secondary">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-dark border-secondary">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card bg-dark border-secondary">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
