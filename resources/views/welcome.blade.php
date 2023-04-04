<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EMA</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  
    @vite(['resources/scss/style.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- Navigation Bar --}}
    <nav class="navbar navbar-expand-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index.html">EMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span id="menu-icon" class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/index.html">Why to choose EMA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/names.html">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#section-c">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#section-c">About Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    {{-- Header --}}
    <div class="container text-center m-y">
        <div class="row">
          <div class="col-sm">
            <h1 id="heading"> Your journey with us starts here </h1>
          </div>
</body>

</html>
