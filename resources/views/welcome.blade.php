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
    <nav class="navbar navbar-expand-sm fixed-top bg-gray-150">
        <div class="container-fluid">
            <a class="navbar-brand" href="/welcome.html">EMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span id="menu-icon" class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">X
                    </button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#section-d">Benefits</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    {{-- Header --}}
    <section class="text-light bg-blue p-5 text-center">
        <div class="container-sm">
            <div class="row">
                <div class="col-sm text-center display-1" id="heading">
                    <h1> Your journey with us starts here </h1>
                    <button class=" btn btn1 " type="btn">Start your journey</button>
                </div>
            </div>
        </div>
    </section>

    {{-- Cards --}}
    <section class="p-5">
        <div class="container">
            <div class="row" id="cont1">
                <div class="col-sm mb-4">
                    <div class="card" style="width: 30rem;">
                        <div class="card-body">
                          <h5 class="card-title">Why Us</h5>
                          <p class="card-text">At EMA, we're committed to helping you save money and reduce your energy impact by providing easy-to-use energy management tools. With our analysis and recommendations, you can feel confident that your're making informed decisions about your energy use.</p>
                        </div>
                      </div>
                </div>
                <div class="col-sm mb-4">
                    <div class="card" style="width: 30rem;">
                        <div class="card-body">
                          <h5 class="card-title">Key features</h5>
                          <ul>
                            <li>Energy trace</li>
                            <li>Seasonal advice</li>
                            <li>Numeric consumption data</li>
                          </ul>
                        </div>
                      </div>
                </div>
                <div class="col-sm mb-4">
                    <div  id="section-d"class="card" style="width: 30rem;">
                        <div class="card-body">
                          <h5 class="card-title">Benefits</h5>
                          <ul>
                            <li>Reduce Energy Costs</li>
                            <li>Increased Energy efficiency</li>
                            <li>Average consumption</li>
                          </ul>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
    
    <footer>
        <div class="text-center position-relative footer py-3">
            <div class = "row">
                <div class="col-sm">
                    <div>
                        <p>Designed for you to save</p>
                        <p class="lead"> Copyright &copy; EMA management webapp
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
