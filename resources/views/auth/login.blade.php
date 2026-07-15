<x-app-layout>
    <div class="container py-5 d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="col-md-6 col-lg-5">
            <div class="auth-card">
                <h3 class="text-center fw-bold mb-4 text-primary">Login to MOVIEin</h3>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-3 form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">Remember me</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-muted text-decoration-none small" href="{{ route('password.request') }}">
                                Forgot your password?
                            </a>
                        @endif

                        <button type="submit" class="btn btn-primary px-4">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
