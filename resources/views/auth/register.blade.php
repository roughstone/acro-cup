<div class="auth-form" id="register">
    <p class="text-center">
        You have account? Go to
        <span class="font-weight-bold">
            <u class="text-link auth-switch">login</u>
        </span>.
    </p>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row mt-2">
            <label for="name" class="col-12 col-form-label">
                Federation / Club / Association:
                <div class="col-12 px-0">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </label>
        </div>

        <div class="form-group row mt-2">
            <label for="email" class="col-12 col-form-label">
                E-Mail
                <div class="col-12 px-0">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                Password
                <div class="col-12 px-0">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </label>
        </div>

        <div class="form-group row mt-2">
            <label for="password-confirm" class="col-12 col-form-label">
                Confirm Password
                <div class="col-12 px-0">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </label>
        </div>

        <div class="form-group row mt-2 mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </div>
    </form>
</div>

