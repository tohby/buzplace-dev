<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Buzplace</title>
  <link href="{{ asset('css/buzplace.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="image/x-icon">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://kit.fontawesome.com/4cc6387cd5.js"></script>
  <link rel="preload" as="font" href="{{ asset('fonts/Inter-UI-upright.var.woff2')}}" type="font/woff2"
    crossorigin="anonymous">
  <link rel="preload" as="font" href="{{ asset('fonts/Inter-UI.var.woff2')}}" type="font/woff2" crossorigin="anonymous">
</head>

<body>
  <div class="header">
    <nav class="navbar navbar-expand-md navbar-dark bg-transparent border-bottom">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="/images/logo_full.png" alt="Buzplace">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>
          {{-- right side of the navbar --}}
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/news">News</a>
            </li>
            <a href="/login" class="btn btn-primary btn-sm"><i class="far fa-user-circle"></i> Signin</a>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-7 px-5 mb-5">
          <div class="header-text animated fadeInLeft">
            <span class="d-block text-uppercase mb-2">Connect with companies globally</span>
            <h1 class="display-4">
              Buzplace extends your market reach accross the globe
            </h1>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card shadow p-3">
            <div class="card-body">
              <h3 class="card-title text-get mb-4">Get started for free</h3>
              <form action="" method="post">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" placeholder="Enter your company name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" placeholder="Enter your email address">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" placeholder="Enter your password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" placeholder="Confirm your password">
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-primary btn-lg btn-block">Get Started</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div>
    <section>
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md-6">
            <div class="row mx-2">
              <div class="col-6 mt-5 px-2 animated fadeInLeft">
                <img src="/images/row/albert.jpg" class="mb-3 img-fluid rounded shadow-lg" alt="">
                <img src="/images/row/micheal.jpg" class="img-fluid rounded shadow-lg" alt="">
              </div>
              <div class="col-6 px-2 animated fadeInRight">
                <img src="/images/row/sage.jpg" class="mb-3 img-fluid rounded shadow-lg" alt="">
                <img src="/images/row/jurica.jpg" class="img-fluid rounded shadow-lg" alt="">
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 ml-auto">
            <div class="py-5 text-left">
              <h3 class="h2">Join a network of Manufacturers, Suppliers and Customers</h3>
              <p class="lead text-muted">Connect quickly and easily with other businesses and services across the globe. Build
                relationships, advertise your products and services and reach more audience.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>