<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gwalior Covid19 - </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-git.min.js"></script>
    <link href="/css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
  
        .footer-classic a, .footer-classic a:focus, .footer-classic a:active {
            color: #ffffff;
        }
        
        .social-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            padding: 23px;
            font: 900 13px/1 "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.5);
        }
            </style>
</head>
<body>
    <div  id="app">
        <nav style="background-color:#ed1b24" class="navbar navbar-expand-md navbar-light  shadow-sm">
            <div  class="container">
                <a class="navbar-brand " href="{{ url('/') }}">
                    <div class="logo">
                        <a href="https://gwalior.nic.in/" title="गो टू होम" class="emblem " rel="home">
                        <img class="site_logo" height="30" id="logo" src="https://cdn.s3waas.gov.in/s3e369853df766fa44e1ed0ff613f563bd/uploads/2019/05/2019052939.jpg" alt="logo">
                          
                     
                      </a>
                      <b class="text-white ml-2"> Gwalior  CovidFree</b>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto ml-3 ">
                        <li class="nav-item ">
                            <a class="nav-link" href="/">Home</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="/download">Download App</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="/register/store">Store Registration</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="/report">Report Crowd</a>
                        </li>

                     

                       


                    </ul>

                
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="section footer-classic context-dark bg-image" style="background: #ed1b24;">
        <div class="container ">
          
        <div class="row no-gutters social-container">
          <div class="col"><a class="social-inner" href="https://github.com/tonraj/gwaliorcovid19"><span class="icon mdi mdi-facebook"></span><span>Github</span></a></div>
          <div class="col"><a class="social-inner" href="https://gwalior.nic.in/"><span class="icon mdi mdi-instagram"></span><span>Gwalior Nagar Nigam</span></a></div>
          <div class="col"><a class="social-inner" href="https://www.mohfw.gov.in/"><span class="icon mdi mdi-twitter"></span><span>MoHFW</span></a></div>
        </div>
      </footer>
</body>
</html>
