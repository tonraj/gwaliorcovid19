@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">
                <div class="card text-white bg-info mb-3" >
                <div class="card-header">Emergency</div>
                <div class="card-body">
                <h5 class="card-title">{{$emergency->count()}}</h5>
                <a href="/admin/emergency" class="card-text text-white">View Requests</a>
                </div>
              </div>
            </div>
            
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3" >
                    <div class="card-header">Social Service Request</div>
                    <div class="card-body">
                      <h5 class="card-title">{{$social->count()}}</h5>
                      <a href="/admin/social" class="card-text text-white">View Requests</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Crowd Report</div>
                    <div class="card-body">
                      <h5 class="card-title">{{$crowd->count()}}</h5>
                      <a href="/admin/crowd" class="card-text text-white">View Reports</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3" >
                    <div class="card-header">Awating Approval Stores</div>
                    <div class="card-body">
                      <h5 class="card-title">{{$stores->count()}}</h5>
                      <a href="/admin/stores" class="card-text text-white">View Stores</a>
                    </div>
                  </div>
                </div>
            </div>
         
        </div>

       
    </div>

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

    <div class="flag note note--warning mb-3 mt-2">
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

    <div class="row">

      

      <div class="col-md-4">

        <div class="card"> <b class="card-header">Update Home</b>
           
           <div class="card-body">
            <form action="" method="post" action="">
            <input class="form-control mb-2" name="cases" value="{{$data['cases']}}" placeholder="Cases In Gwalior" type="text">
              <input class="form-control mb-2" name="helpline" value="{{$data['helpline']}}" placeholder="Helpline Number" type="text">
              
             
          </p>
          {{csrf_field()}}
          <button name="home" value="update" type="submit" class="btn btn-primary">Save Changes</button>
        </form>  </div>

      </div>
    </div>
      <div class="col-md-8">

        <div class="card mb-2" >
          <b class="card-header small bg-dark text-white">Quick Announcement</b>
            <div class="card-body">
              
              <p class="card-text">
                <form action="" method="post" action="">
                  <input class="form-control mb-2" name="link" placeholder="Link" type="text">
                  
                  <textarea class="form-control"  placeholder="Message" name="message"></textarea>
              </p>
              {{csrf_field()}}
              <button name="announcement" value="add" type="submit" class="btn btn-primary">Save announcement</button>
            </form>
            </div>
          </div>

      </div>

    </div>
</div>
@endsection
