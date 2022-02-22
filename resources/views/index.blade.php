<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Buzplace</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/buzplace.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fslightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <script src="{{ asset('js/app.js') }}" defer></script>
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Buzplace') }}</title>
    <script src="https://kit.fontawesome.com/4cc6387cd5.js"></script>
    
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand"><img src="/svg/logos/logo.svg" alt="Buzplace"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Sign in</a>
                    </li>
                    <button class="btn btn-primary" type="button">Join us</button>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-content">
        <section class="buz-hero">
            <div class="container">
                <div class="row hero_row">
                    <div class="col-md-6 hero_col1">
                        <h1 class="hero_title title-xxl aos-init aos-animate" data-aos="fade-up"> Building sustainable
                            business connections</h1>
                        <p class="m-hero__desc aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">Helping
                            growing businesses retain and scale their brand and
                            revenue by connecting them to other stakeholders of like intent across the globe.</p>
                    </div>
                    <div class="col-md-6 hero_col2">
                        <div class="hero_media aos-init aos-animate">
                            <div class="hero_img">
                                <img src="/hero/home-hero-image5.jpg" alt="Buzplace" width="768" height="862">
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        </div>
        @include('cookie-consent::index')
    </main>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script>
        AOS.init();
    </script>
    {{-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bec3b168829ed15"></script> --}}
</body>

</html>
