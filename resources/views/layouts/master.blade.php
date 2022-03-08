<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('head')

    <title>{{ config('app.name', 'Welcome to Buzplace') }}</title>

    <!-- Fonts -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('css/buz4564.css') }}">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/svg/logos/icon.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light fixed-top py-1">
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
                                    <a class="nav-link" href="/consultation">Consultations</a>
                                </div>
                                <div class="avatar">
                                    <h4 class="mt-2">
                                        {{ str_replace('-', ' ', Str::ucfirst(request()->segment(1))) }}</h4>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                <a class="navbar-brand py-2" href="{{ url('/') }}">
                    <img src="/svg/logos/logo_white.svg" alt="Buzplace">
                </a>
                <hr>
                <div id="menu" class="px-3 scroll-area">
                    <a href="/the-hub"
                        class="{{ request()->is('the-hub') || request()->is('the-hub/*') ? 'active' : '' }}">
                        <img src="/svg/icons/Category.svg" class="me-2" alt=""> The Hub</a>
                    <a href="/profile/{{ Auth::user()->slug }}"
                        class="{{ request()->is('profile/*') || request()->is('profile/*/edit') || request()->is('product/*') ? 'active' : '' }}"><img src="{{ asset('/svg/icons/User.svg') }}" class="me-2" alt=""> Profile</a>
                    <a href="/news"
                        class="{{ request()->is('news') || request()->is('news/*') ? 'active' : '' }}"><img src="{{ asset('/svg/icons/Paper-Note.svg') }}" class="me-2" alt=""> News</a>
                    @if (Auth::user()->is_admin)
                        <a href="/canvas" class="ml-4" target="_blank">Canvas</a>
                    @endif
                    {{-- <a href="/messages" class="{{ request()->is('messages') || request()->is('messages/*') ? 'active' : '' }}"></i>Conversations</a> --}}
                    <a href="/directories"
                        class="{{ request()->is('directories') || request()->is('directories/*') ? 'active' : '' }}"><img src="{{ asset('/svg/icons/Drawer-Done.svg') }}" class="me-2" alt="">Directories</a>
                    <a href="/consultation"
                        class="{{ request()->is('consultation') ? 'active' : '' }}"><img src="{{ asset('/svg/icons/Question-Circle.svg') }}" class="me-2" alt="">Consultations</a>
                </div>
                <div class="dropup">
                    <a class="user-container__2aQ3F dropdown-toggle" id="dropdownMenuLink" role="button"  data-bs-toggle="dropdown" aria-expanded="false"
                        href="#">
                        <span class="avatar">
                            <span class="avatar-image-wrapper">
                                <img alt="" class="avatar-image" src="{{ Auth::user()->avatar }}">
                            </span>
                            <span class="avatar-content">
                                <span class="avatar-name">{{ Auth::user()->name }}</span>
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="/profile/{{ Auth::user()->slug }}"> <img src="{{ asset('/svg/icons/User.svg') }}" class="me-2" alt="">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{ asset('/svg/icons/Logout.svg') }}" class="me-2" alt="">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @endauth

        <main class="py-4 px-2">
            @if (count($errors) > 0)
                {
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
