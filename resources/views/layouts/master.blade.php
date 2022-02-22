<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('head')

    <title>{{ config('app.name', 'Buzplace') }}</title>

    <!-- Fonts -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('css/buz4564.css') }}">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light fixed-top p-3">
            <div class="container-fluid px-5">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="nav justify-content-end">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link btn btn-primary text-white px-3"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <div class="d-md-none">
                                    <a class="nav-link" href="/the-hub">The Hub</a>
                                    <a class="nav-link" href="/profile/{{ Auth::user()->slug }}">Profile</a>
                                    <a class="nav-link" href="/news">News</a>
                                    {{-- <a class="nav-link" href="/messages">Conversations</a> --}}
                                    <a class="nav-link" href="/directories">Directories</a>
                                    <a class="nav-link" href="/consultation">Consultation</a>
                                </div>
                                <div class="avatar">
                                    <h4>{{ str_replace('-', ' ', Str::ucfirst(request()->segment(1)))}}</h4>
                                    {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="avatar-image-wrapper">
                                            <img alt="" class="avatar-image" src="/images/{{ Auth::user()->avatar }}"
                                                alt="Profile image">
                                        </span> &nbsp;{{ Auth::user()->first_name }}
                                    </a> --}}

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        @auth
            <div class="sidenav">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/logo2.png" alt="Buzplace">
                </a>
                <hr>
                <div id="menu" class="px-3 scroll-area">
                    <a href="/the-hub"
                        class="{{ request()->is('the-hub') || request()->is('the-hub/*') ? 'active' : '' }}">
                        The Hub</a>
                    <a href="/profile/{{ Auth::user()->slug }}"
                        class="{{ request()->is('profile/*') || request()->is('profile/*/edit') || request()->is('product/*') ? 'active' : '' }}"></i>Profile</a>
                    <a href="/news"
                        class="{{ request()->is('news') || request()->is('news/*') ? 'active' : '' }}"></i>News</a>
                    @if ((request()->is('news') || request()->is('news/*')) && Auth::user()->is_admin)
                        <a href="/canvas" class="ml-4" target="_blank">Canvas</a>
                    @endif
                    {{-- <a href="/messages" class="{{ request()->is('messages') || request()->is('messages/*') ? 'active' : '' }}"></i>Conversations</a> --}}
                    <a href="/directories"
                        class="{{ request()->is('directories') || request()->is('directories/*') ? 'active' : '' }}"></i>Directories</a>
                    <a href="/consultation"
                        class="{{ request()->is('consultation') ? 'active' : '' }}"></i>Consultations</a>
                </div>
                <a class="user-container__2aQ3F" href="/buildings/user/settings">
                    <span class="avatar">
                        <span class="avatar-image-wrapper">
                            <img alt="" class="avatar-image" src="/images/{{ Auth::user()->avatar }}">
                        </span>
                        <span class="avatar-content">
                            <span class="avatar-name">{{ Auth::user()->name }}</span>
                        </span>
                    </span>
                </a>
            </div>
        @endauth
        
        <main class="py-5 px-2">
            @if (count($errors) > 0){
                <div class="container my-3">
                    @include('layouts/messages')
                </div>
                }
            @endif
            @yield('content')
        </main>

    </div>

    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/bs-custom-file-input.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/buzplace.js') }}"></script>
    @yield('scripts')
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bec3b168829ed15"></script>
</body>

</html>
