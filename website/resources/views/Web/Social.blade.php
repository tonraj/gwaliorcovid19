@extends('layouts.web')

@section('content')
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
                  <p class="card-text text-white">You are a true <strong>HERO</strong>, your service will be showed in the Map. </p>
                 </div>
              </div>
              
  <div class="row mb-4">
    
    <div class="col-md-4">
      
      <form action="" method="post">
        <div class="form-group">
            <label for="pwd">Your Name:</label>
            <input type="text"  name="name" class="form-control" id="pwd">
        </div>
        <div class="row">
          
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Title:</label>
                    <input type="text" name="title" class="form-control" id="email">
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
        
        <div class="form-group">
          <label for="pwd">Service Address:</label>
          <textarea class="form-control" name="address" type="text" class="form-control" id="pwd"></textarea>
        </div>

        <div class="form-group">
            <label for="pwd">Phone Number:</label>
            <input type="text"  name="phone" class="form-control" id="pwd">
        </div>

        <div class="row">
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pwd">Service Latitude:</label>
                    <input type="number" name="lat" class="form-control" id="pwd">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="pwd">Service Longitude:</label>
                    <input type="number" name="lond" class="form-control" id="pwd">
                    </div>
            </div>
        </div>

        
        <div class="form-group">
            <label for="exampleInputPassword1">Service End Time</label>
            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                <input autocomplete="off" name="time" type="text" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#datetimepicker1"/>
                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
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
          How to join?
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Register if you are a <strong> <a href="">Store Owner </a> or doing <a href="">  Social Services </a> </strong>.</li>
        <li class="list-group-item">Fill the form with correct Details</li>
        <li class="list-group-item">Submit the form</li>
        <li class="list-group-item">Download our App for Better Exprience <strong><a href="">Our APP</a></strong></li>
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

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>


<script type="text/javascript">
  $(document).ready(function () {
  
  @if ($errors->any())
      $('#exampleModal').modal('show');
  @endif
  });
  </script>

@endsection


