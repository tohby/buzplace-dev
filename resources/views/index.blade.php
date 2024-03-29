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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/svg/logos/icon.svg') }}" type="image/x-icon">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Buzplace') }}</title>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-light bg-white px-2">
            <a class="navbar-brand"><img src="/svg/logos/logo.svg" alt="Buzplace"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="/news">News</a>
                    </li>
                    <span class="vr align-self-center d-none d-sm-block"></span>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="{{ route('login') }}">Sign in</a>
                    </li>
                    <a href="{{ route('register') }}" class="btn btn-primary">Join us</a>
                </ul>
            </div>
        </nav>
    </div>

    <main class="main-content">
        <section class="buz-hero">
            <div class="container">
                <div class="row gy-4 gx-sm-0 gx-lg-5">
                    <div class="col-md-6">
                        <h1 class="hero_title title-xxl text-md-start text-sm-center" data-aos="fade-up"> Building
                            sustainable
                            business connections</h1>
                        <p class="m-hero__desc text-md-start text-sm-center" data-aos="fade-up" data-aos-delay="100">
                            Helping
                            growing businesses retain and scale their brand and
                            revenue by connecting them to other stakeholders of like intent across the globe.</p>
                        <div class="hero_button" data-aos="fade-up" data-aos-delay="200">
                            <div class="d-grid gap-2 col-md-6 mx-sm-auto mx-md-0 mb-sm-4">
                                <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Get started</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hero_media" data-aos="fade-up">
                            <div class="hero_img">
                                <img src="/hero/hero.png" class="img-fluid" alt="Buzplace">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="buz_partners">
            <div class="container py-4">
                <h2 class="text-center">Join thousands of global businesses who trust in us</h2>
                <div class="row justify-content-center mt-3 gy-4">
                    <div class="col"><img src="/partners/9round-logo-white.png" class="mx-auto d-block" alt="9ground"></div>
                    <div class="col"><img src="/partners/9round-logo-white.png" class="mx-auto d-block" alt="9ground"></div>
                    <div class="col"><img src="/partners/9round-logo-white.png" class="mx-auto d-block" alt="9ground"></div>
                    <div class="col"><img src="/partners/9round-logo-white.png" class="mx-auto d-block" alt="9ground"></div>
                    <div class="col"><img src="/partners/9round-logo-white.png" class="mx-auto d-block" alt="9ground"></div>
                </div>
            </div>
        </section>
        <section id="features">
            <div class="container">
                <div class="col-md-9 col-sm-12">
                    <h2 data-aos="fade-up">Boost your business <strong>with tools to deliver the best physical and
                            digital member
                            experience</strong></h2>
                </div>
                <div class="row gx-sm-0 gx-lg-5">
                    <div class="col-md-6 py-5" data-aos="fade-up" data-aos-delay="100">
                        <img src="/images/join-network.png" alt="Communication" class="rounded-3 img-fluid">
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center flex-column"
                        data-aos="fade-up" data-aos-delay="200">
                        <h2>Join a network of Manufacturers, Suppliers and Customers</h2>
                        <p class="mt-3">Connect quickly and easily with other businesses and services across
                            the globe. Build
                            relationships, advertise your products and services and reach more audience.</p>
                    </div>
                </div>
                <div class="row flex-md-row-reverse gx-sm-0 gx-lg-5">
                    <div class="col-md-6 py-5" data-aos="fade-up" data-aos-delay="100">
                        <img src="/images/consultation.png" alt="Communication" class="rounded-3 img-fluid">
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center flex-column"
                        data-aos="fade-up" data-aos-delay="200">
                        <h2>Get consultations from our professionals</h2>
                        <p class="mt-3">Let our team of experts and consultancy team locate your needs and
                            products for you. Our goal is to contact busineses, get you the best offers, research
                            products and solve any such challenges. Let's do the worry and research, just tell us your
                            needs.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="border-top">
        <div class="container p-3">
            <div class="my-2 w-10 mx-auto d-block">
                <img src="/svg/logos/icon.svg" alt="Buzplace">
            </div>
            <h6 class="text-center">
                &copy;2022 Buzplace
            </h6>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // values from 0 to 3000, with step 50ms
            easing: 'ease', // default easing for AOS animations
            once: true,
        });
    </script>
    {{-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bec3b168829ed15"></script> --}}
</body>

</html>
