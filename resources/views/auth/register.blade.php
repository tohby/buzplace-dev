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

<body class="bg-reg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-5">
                    <div class="text-center mb-5">
                        <h6 class="h3 mb-1">Sign Up</h6>
                        <p class="text-muted">Create an account, it's the first step you take to connect to the world.
                        </p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input id="name" type="text"
                                    class="form-control form-control-lg{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ old('name') }}" required placeholder="Name" autofocus> @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span> @endif
                            </div>

                            <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" placeholder="Email" value="{{ old('email') }}" required> @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                            </div>

                            <div class="form-group">
                                    <input id="password" type="password"
                                        class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" placeholder="Password" required> @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>

                            <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control form-control-lg"
                                        name="password_confirmation" placeholder="Confirm Password" required>
                            </div>

                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        {{ __('Register') }}
                                    </button>
                            </div>
                        </form>
                        <div class="form-group mb-0 mt-2">
                            <div class="col-md-6 offset-md-3">
                                <a class="btn btn-link text-center" href="{{ route('login') }}">
                                    Already have an account? Sign in
                                </a>
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-link text-center" href="{{ url('/') }}">
                                    Go Back home
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