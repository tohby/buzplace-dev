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
    <nav class="navbar navbar-dark bg-transparent">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/images/logo2.png" width="220px" alt="">
            </a>
        </div>
    </nav>
    <div class="container-fluid header-container">
      <div class="row">
        <div class="col-lg-7">
          <div class="header-text">
            <h1>Inside Life</h1>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card">
            <div class="card-body">
              <h1>cards</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</body>
</html>