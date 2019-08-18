<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buzplace</title>
  <link href="{{ asset('css/buzplace.css') }}" rel="stylesheet">
</head>

<body>
  <header class="header">
    <nav class="navbar navbar-dark navbar-expand-md bg-transparent border-bottom">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="/images/logo_full.png" width="200px" alt="">
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <button type="button" class="btn btn-primary btn-lg">Login</button>
      </div>
    </nav>
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-7 px-5 mb-5">
          <div class="header-text">
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
  </header>
</body>

</html>