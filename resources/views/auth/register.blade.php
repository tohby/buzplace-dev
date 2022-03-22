<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Welcome to Buzplace | Sign up') }}</title>
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
            <div class="col-12 col-md-5 col-lg-6 col-xl-7 px-lg-6 my-5 align-self-center">

                <!-- Heading -->
                <div class="my-5 w-10 mx-auto d-block">
                    <img src="/svg/logos/icon.svg" alt="Buzplace">
                </div>
                <h1 class="display-4 text-center mb-3">
                    Hi, Welcome to Buzplace
                </h1>

                <!-- Subheading -->
                <p class="text-muted text-center mb-5">
                    Sign up to continue to your dashboard.
                </p>

                <!-- Form -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    @honeypot
                    <!-- Name -->
                    <div class="form-group">

                        <!-- Label -->
                        <label class="form-label">
                            Full Name
                        </label>

                        <!-- Input -->
                        <input id="name" type="text"
                                    class="form-control form-control-lg{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ old('name') }}" required placeholder="Name" autofocus> @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span> @endif
                    </div>
                    <!-- Email address -->
                    <div class="form-group">

                        <!-- Label -->
                        <label class="form-label">
                            Email Address
                        </label>

                        <!-- Input -->
                        <input id="email" type="email"
                            class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            name="email" placeholder="Email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
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
                        </div> <!-- / .row -->

                        <!-- Input group -->
                        <div class="input-group input-group-merge">

                            <!-- Input -->
                            <input id="password" type="password"
                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password" placeholder="Password" required>
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

                    <!--Confirm Password -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col">

                                <!-- Label -->
                                <label class="form-label">
                                    Confirm Password
                                </label>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Input group -->
                        <div class="input-group input-group-merge">

                            <!-- Input -->
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" placeholder="Confirm Password" required>
                            <!-- Icon -->
                            <span class="input-group-text">
                                <i class="fe fe-eye"></i>
                            </span>

                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-lg w-100 btn-primary mb-3">
                        Sign up
                    </button>

                    <!-- Link -->
                    <p class="text-center">
                        <small class="text-muted text-center">
                            Already have an account? <a href="{{ route('login') }}">Log in</a>.
                        </small>
                    </p>

                </form>

            </div>
            <div class="col-12 col-md-7 col-lg-6 col-xl-5 d-none d-lg-block">

                <!-- Image -->
                <div class="bg-cover h-100 min-vh-100 mt-n1 me-n3"
                    style="background-image: url(/images/covers/auth-side-cover-1.jpg);"></div>

            </div>
        </div> <!-- / .row -->
    </div>
</body>


</html>
