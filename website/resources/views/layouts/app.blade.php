<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gwalior Covid19 Admin </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-git.min.js"></script>
    <link href="/css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                      <b class="text-white"> Gwalior </b>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto ml-3 ">
                        <li class="nav-item ">
                            <a class="nav-link" href="/admin/helper">Officer</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="/admin/stores">Stores</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="/admin/social">Social Services</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="/admin/emergency">Emergency Request</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="/admin/crowd">Crowd Report</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="/admin/map">Map Data</a>
                        </li>

                        

                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Announcements
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="/admin/message">Send Message</a>
                              <a class="dropdown-item" href="/admin/bulkmessage"> Bulk Messages</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="/admin/announcement">Homepage Message</a>
                            </div>
                          </li>

                    


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
