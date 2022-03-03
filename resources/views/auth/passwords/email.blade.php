<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Welcome to buzplace | Sign in') }}</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login_custom.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/svg/logos/icon.svg') }}" type="image/x-icon">
</head>

<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary" style="display: block;"
    cz-shortcut-listen="true">

    <!-- CONTENT
    ================================================== -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-xl-4 my-5">

                <!-- Heading -->
                <h1 class="display-4 text-center mb-3">
                    Password reset
                </h1>

                <!-- Subheading -->
                <p class="text-muted text-center mb-5">
                    Enter your email to get a password reset link.
                </p>

                <!-- Form -->
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <!-- Email address -->
                    <div class="form-group">

                        <!-- Label -->
                        <label class="form-label">
                            Email Address
                        </label>

                        <input id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ old('email') }}" required placeholder="name@address.com">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-lg w-100 btn-primary mb-3">
                        Reset Password
                    </button>

                    <!-- Link -->
                    <div class="text-center">
                        <small class="text-muted text-center">
                            Remember your password? <a href="sign-in.html">Log in</a>.
                        </small>
                    </div>

                </form>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->

</body>

</html>
