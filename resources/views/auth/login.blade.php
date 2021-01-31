<div class="d-none auth-form" id="login">
    <p class="text-center">
        You don't' have account? Go to
        <span class="font-weight-bold">
            <u class="text-link auth-switch">register</u>
        </span>.
    </p>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row mt-2">
            <label for="email" class="col-12 col-form-label">
                E-Mail
                <div class="col-12 px-0">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </label>
        </div>

        <div class="form-group row mt-2">
            <label for="password" class="col-12 col-form-label">
                Password:
                <div class="col-12 px-0">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </label>
        </div>

        <div class="form-group row mt-2">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mt-2 mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                @endif
            </div>
        </div>
    </form>
</div>
