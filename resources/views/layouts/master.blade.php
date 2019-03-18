<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Buzplace') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css')}}">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('images/logo.png')}}">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/logo2.png" width="150px" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                            <a class="nav-link btn btn-primary text-white btn-lg" href="{{ route('register') }}">{{ __('Register') }}</a>                            @endif
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <div class="d-md-none">
                                <a class="nav-link" href="/the-hub">The Hub</a>
                                <a class="nav-link" href="/profile/{{Auth::user()->slug}}">Profile</a>
                                <a class="nav-link" href="/news">News</a>
                                <a class="nav-link" href="/the-hub">Conversations</a>
                                <a class="nav-link" href="/directories">Directories</a>
                                <a class="nav-link" href="/the-hub">Consultation</a>
                            </div>
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="sidenav d-none d-md-block">
            <a href="/the-hub" class="{{ request()->is('the-hub') || request()->is('the-hub/*') ? 'active' : '' }}"> The Hub</a>
            <a href="/profile/{{Auth::user()->slug}}" class="{{ request()->is('profile/*') || request()->is('profile/*/edit') ? 'active' : '' }}"></i>Profile</a>
            <a href="/news" class="{{ request()->is('news') || request()->is('news/*') ? 'active' : '' }}"></i>News</a>
            <a href="/admin/messages" class="{{ request()->is('sites/*/edit') ? 'active' : '' }}"></i>Conversations</a>
            <a href="/directories" class="{{ request()->is('directories') || request()->is('directories/*') ? 'active' : '' }}"></i>Directories</a>
            <a href="/consultation" class="{{ request()->is('consultation') ? 'active' : '' }}"></i>Consultations</a>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/aos.js') }}"></script>
</body>

</html>