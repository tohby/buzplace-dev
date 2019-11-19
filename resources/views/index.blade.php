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
  <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="image/x-icon">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://kit.fontawesome.com/4cc6387cd5.js"></script>
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
            <a href="/login" class="btn btn-primary btn-sm"><i class="far fa-user-circle"></i> Sign in</a>
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
              <h3 class="card-title text-get mb-4">Get started</h3>
              <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group">
                  <input type="text" name="name"
                    class="form-control form-control-lg{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    value="{{ old('name') }}" placeholder="Enter your name" required autofocus>
                  @if($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="email" name="email"
                    class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    value="{{ old('email') }}" placeholder="Enter your email address" required autofocus>
                  @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="password" name="password"
                    class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}"
                    placeholder="Enter your password" required autofocus>
                  @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="password" name="password_confirmation" class="form-control form-control-lg"
                    placeholder="Confirm your password" required autofocus>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Get Started</button>
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
              <p class="lead text-muted">Connect quickly and easily with other businesses and services across the globe.
                Build
                relationships, advertise your products and services and reach more audience.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div>
    <section>
      <div class="container position-relative">
        <div class="card br-1 shadow-lg border-0 zindex-100">
          <div class="card-body px-5 py-5 text-center text-md-left">
            <div class="row align-items-center">
              <div class="col-md-8">
                <h4 class="h5 mb-2">Expand your business reach.</h4>
                <p class="mb-0">Our team can connect you to the people you need to meet your business goals.</p>
              </div>
              <div class="col-12 col-md-4 mt-4 mt-md-0 text-md-right">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg rounded-pill"><span
                    class="btn-inner--text">Join us today</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="w-10 position-absolute bottom-n3 left-n5 d-none d-md-block d-lg-block d-xl-block">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px"
            y="0px" viewBox="0 0 361.1 384.8" style="enable-background:new 0 0 361.1 384.8;" xml:space="preserve"
            class="fill-primary">
            <path
              d="M53.1,266.7C19.3,178-41,79.1,41.6,50.1S287.7-59.6,293.8,77.5c6.1,137.1,137.8,238,15.6,288.9 S86.8,355.4,53.1,266.7z">
            </path>
          </svg>
        </div>
        <div class="w-10 position-absolute top-n5 right-n5 d-none d-md-block d-lg-block d-xl-block">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px"
            y="0px" viewBox="0 0 361.1 384.8" style="enable-background:new 0 0 361.1 384.8;" xml:space="preserve"
            class="fill-dark">
            <path
              d="M53.1,266.7C19.3,178-41,79.1,41.6,50.1S287.7-59.6,293.8,77.5c6.1,137.1,137.8,238,15.6,288.9 S86.8,355.4,53.1,266.7z">
            </path>
          </svg>
        </div>
      </div>
    </section>
  </div>

  <div>
    <section>
      <div class="container">
        <div class="row align-items-center justify-content-around">
          <div class="col-lg-5 col-md-6 aos-init aos-animate" data-aos="fade-up">
            <h2 class="h1">Get consultations from our professionals</h2>
            <p class="lead">Let our team of
              experts and consultancy team locate your needs and products for you. Our goal is to contact busineses, get
              you the best
              offers, research products and solve any such challenges.
              Let's do the worry and research, just tell us your needs.</p>
          </div>
          <div class="col-xl-4 col-lg-5 col-md-6 mb-4 mb-md-0 aos-init aos-animate" data-aos="fade-up">
            <img src="/images/hunters-race.jpg" alt="Image" class="rounded shadow-3d img">
          </div>
        </div>
      </div>
    </section>
  </div>

  <div>
    @if (count($news) > 0)
    <section>
      @include('news_section')
    </section>
    @endif
  </div>

</body>

</html>