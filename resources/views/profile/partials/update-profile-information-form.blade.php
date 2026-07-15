<section>
    <header>
        <h2 class="h5 fw-bold text-white">Profile Information</h2>
        <p class="text-muted small">Update your account's profile information and email address.</p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary">Save Changes</button>

            @if (session('status') === 'profile-updated')
                <p class="text-success small mb-0"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                >Saved.</p>
            @endif
        </div>
    </form>
</section>
