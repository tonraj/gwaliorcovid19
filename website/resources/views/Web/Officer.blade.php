<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register as Officer - Gwalior CovidFree</title>

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
                        <a href="/" title="गो टू होम" class="emblem " rel="home">
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
<div class="container">
    <div class="flash-message mb-2 mt-2">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          
          <div class="flag note note--{{ $msg }}">
            @if ($msg == 'success')
            <div class="flag__image note__icon">
              <i class="fa fa-check"></i>
              </div>

            @elseif ($msg == 'warning')
                <div class="flag__image note__icon">
                  <i class="fa fa-exclamation"></i>
                  </div>

            @elseif ($msg == 'danger')
            <div class="flag__image note__icon">
              <i class="fa fa-times"></i>
              </div>

            @elseif ($msg == 'info')
            <div class="flag__image note__icon">
              <i class="fa fa-info"></i>
            </div>
            
            @endif

            <div class="flag__body note__text">
              {{ Session::get('alert-' . $msg) }}
            </div>
          
            </div>


          @endif
        @endforeach
      </div>

      @if ($errors->any())
      
              <div class="flag note note--warning mb-2 mt-2">
                <div class="flag__image note__icon">
                <i class="fa fa-exclamation"></i> 
                </div>
                <div class="flag__body note__text">
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
                </div>
                
                </div>
              @endif

              <div class="card bg-info mb-4" >
                <div class="card-body">
                  <p class="card-text text-white">You are a true <strong>HERO</strong>, You will get notifications from the authority for actions. </p>
                 </div>
              </div>
              
  <div class="row mb-4">
    
    <div class="col-md-4">
      
     
      <form action="" method="post">
        <div class="form-group">
            <label for="pwd">Officer Name:</label>
            <input type="text"  name="name" class="form-control" id="pwd">
        </div>
        <div class="row">
          
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Phone Number:</label>
                    <input type="text" name="number" class="form-control" id="email">
                  </div>
            </div>
            <div class="col-md-6">
                
        <div class="form-group">
            <label for="pwd">Nearby Police Station:</label>
            <select name="polic" class="form-control">
                @foreach($helper as $help)
            <option value="{{$help->id}}">{{$help->name}}</option>
                @endforeach
            </select>
          </div>

            </div>
        </div>
        
        

       

        {{csrf_field()}}

        <button type="submit" class="btn btn-primary mt-2 btn-block">Save Social Service</button>
    
    </form>

    </div>
    <div class="col-md-1 mt-3"></div>
    <div class="col-md-7">

      <div class="card" >
        <div class="card-header">
          Thank you for serving us :)
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Register if you are a <strong> <a href="">Store Owner </a> or doing <a href="">  Social Services </a> </strong>.</li>
        <li class="list-group-item">Fill the form with correct Details.</li>
        <li class="list-group-item">Download our App to get updates and change status through the <strong><a href="">APP</a></strong></li>
      </ul>
      </div>

      <div class="card mt-3" >
        <div class="card-header">
          Why you should join?
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Be a <b>HERO</b> by helping others in this tough situtaion</li>
          <li class="list-group-item">Join us in the <strong> Fight Against Corona Virsu/COVID-19</strong></li>
          <li class="list-group-item">Contribute to the community the Better Way !</li>
        </ul>
      </div>

      </div>
  </div>


</div>


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
