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


@endsection