<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('head')

    <title>{{ config('app.name', 'Buzplace') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css')}}">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('images/logo.png')}}">

    <style>
        .ion-icon {
            font-size: 64px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .share {
            display: flex;
            position: fixed;
            flex-direction: column;
            justify-content: center;
            height: 60vh;
        }

        .icon {
            font-size: 1.7rem;
            cursor: pointer;
            padding: 1rem;
        }

        .gallery {
            cursor: pointer;
            position: relative;
        }

        .gallery__item {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, .7);
            opacity: 0;
            z-index: -1;
        }

        .gallery__item a {
            color: #fff;
            font-size: 1.7rem;
            cursor: pointer;
            padding: 1rem;
        }

        .gallery:hover .gallery__item {
            opacity: 1;
            z-index: 1000;
        }
    </style>

</head>

<body class="{{ request()->is('admin/messages') || request()->is('admin/messages/*') ? 'no-overflow' : '' }}">
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
                                <a class="nav-link" href="/messages">Conversations</a>
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
            <a href="/profile/{{Auth::user()->slug}}" class="{{ request()->is('profile/*') || request()->is('profile/*/edit') || request()->is('product/*') ? 'active' : '' }}"></i>Profile</a>
            <a href="/news" class="{{ request()->is('news') || request()->is('news/*') ? 'active' : '' }}"></i>News</a>
            <a href="/messages" class="{{ request()->is('messages') || request()->is('messages/*') ? 'active' : '' }}"></i>Conversations</a>
            <a href="/directories" class="{{ request()->is('directories') || request()->is('directories/*') ? 'active' : '' }}"></i>Directories</a>
            <a href="/consultation" class="{{ request()->is('consultation') ? 'active' : '' }}"></i>Consultations</a>
        </div>
        <main class="py-4">
            <div class="container my-3">
                @include('layouts/messages')
            </div>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'news-content' );
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
    <script src="{{ asset('js/bs-custom-file-input.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            bsCustomFileInput.init()
            var btn = document.getElementById('btnResetForm')
            var form = document.querySelector('form')
            btn.addEventListener('click', function () {
              form.reset()
            })
          });
    </script>
    @yield('scripts')
</body>
</html>
