<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Welcome to buzplace | Sign in') }}</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/login_custom.css">
    <link rel="shortcut icon" href="{{ asset('/svg/logos/icon.svg') }}" type="image/x-icon">
    {{-- <link rel="stylesheet" href="css/app.css"> --}}
</head>

<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary" style="display: block;"
    cz-shortcut-listen="true">

    <!-- CONTENT
    ================================================== -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5 align-self-center">

                <!-- Heading -->
                <div class="my-5 w-10 mx-auto d-block">
                    <img src="/svg/logos/icon.svg" alt="Buzplace">
                </div>
                <h1 class="display-4 text-center mb-3">
                    Hi, Welcome to Buzplace
                </h1>

                <!-- Subheading -->
                <p class="text-muted text-center mb-5">
                    Sign in to continue to your dashboard.
                </p>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @honeypot
                    <!-- Email address -->
                    <div class="form-group">

                        <!-- Label -->
                        <label class="form-label">
                            Email Address
                        </label>

                        <!-- Input -->
                        <input id="email" type="email"
                            class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email"
                            name="email" value="{{ old('email') }}" required autofocus placeholder="name@address.com">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $errors->first('email') }}
                                </strong>
                            </span>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col">

                                <!-- Label -->
                                <label class="form-label">
                                    Password
                                </label>

                            </div>
                            <div class="col-auto">

                                <!-- Help text -->
                                <a href="{{ route('password.request') }}" class="form-text small text-muted">
                                    Forgot password?
                                </a>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Input group -->
                        <div class="input-group input-group-merge">

                            <!-- Input -->
                            <input id="password" type="password"
                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password" placeholder="Enter your password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <!-- Icon -->
                            <span class="input-group-text">
                                <i class="fe fe-eye"></i>
                            </span>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-lg w-100 btn-primary mb-3">
                        Sign in
                    </button>
                    <div class="header__center text-muted my-3">OR</div>
                    <a href="{{ url('login/google') }}" class="btn btn-lg w-100 btn-light mb-3">
                        <img src="/svg/logos/google.svg" class="img-fluid w-1" alt="Google"> Sign in with google
                    </a>

                    <!-- Link -->
                    <p class="text-center">
                        <small class="text-muted text-center">
                            Don't have an account yet? <a href="{{ route('register') }}">Sign up</a>.
                        </small>
                    </p>

                </form>

            </div>
            <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">

                <!-- Image -->
                <div class="bg-cover h-100 min-vh-100 mt-n1 me-n3"
                    style="background-image: url(/images/covers/auth-side-cover-1.jpg);"></div>

            </div>
        </div> <!-- / .row -->
    </div>
</body>

</html>
