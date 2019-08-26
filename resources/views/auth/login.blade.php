<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <title>{{ config('app.name', 'Buzplace') }}</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/app.css">
</head>

<body class="bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
<<<<<<< HEAD
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h4>Login</h4>
                        </div>
                    </div>
                    <div class="card-body">
=======
                <div class="card rounded-xl">
                    <div class="card-body py-5">
                        <div class="text-center mb-5">
                            <h6 class="h3 mb-1">Login</h6>
                            <p class="text-muted">Sign in to your account to continue.</p>
                        </div>
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email"
                                    class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
<<<<<<< HEAD
                                        name="email" 
                                        value="{{ old('email') }}" 
                                        required 
                                        autofocus> 
                                        @if ($errors->has('email'))
                                            <span 
                                            class="invalid-feedback" 
                                            role="alert">
                                                <strong>
                                                    {{ $errors->first('email') }}
                                                </strong>
                                            </span> 
                                        @endif
=======
                                        name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $errors->first('email') }}
                                        </strong>
                                    </span>
                                    @endif
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required> @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old( 'remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-1">
                                    <a class="btn btn-link text-center" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> | <a href="{{ route('register') }}">Don't have an account? Sign up</a>
                                </div>
                            </div>
                        </form>
                        <p class="text-center">OR</p>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ url ('login/google')}}">
                                    <div class="google-btn">
                                        <div class="google-icon-wrapper">
                                            <img class="google-icon"
                                                src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                                        </div>
                                        <p class="btn-text"><b>Sign in with google</b></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-link text-center" href="{{ url('/') }}">
<<<<<<< HEAD
                                    Back home
=======
                                    Go back home
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>