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
                <div class="card rounded-lg">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <h6 class="h3 mb-1">Login</h6>
                            <p class="text-muted">Sign in to your account to continue.</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        placeholder="Email"
                                        name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $errors->first('email') }}
                                        </strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                    <input id="password" type="password"
                                        class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password"
                                        placeholder="Password" required> @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
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

                            <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                                        {{ __('Login') }}
                                    </button>
                            </div>
                            <div class="form-group">
                                    <a class="btn btn-link text-center" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> | <a href="{{ route('register') }}"> Don't have an account? Sign up</a>
                            </div>
                        </form>
                        <p class="text-center">OR</p>
                        <div class="form-group">
                            <a href="{{ url ('login/google')}}" class="btn btn-lg btn-danger btn-block"> Sign in with google</a>
                                {{-- <a href="{{ url ('login/google')}}">
                                    <div class="google-btn">
                                        <div class="google-icon-wrapper">
                                            <img class="google-icon"
                                                src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                                        </div>
                                        <p class="btn-text"><b>Sign in with google</b></p>
                                    </div>
                                </a> --}}
                        </div>
                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-link text-center" href="{{ url('/') }}">
                                    Go back home
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