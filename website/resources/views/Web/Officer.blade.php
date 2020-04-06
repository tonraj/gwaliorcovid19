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
<div class="card ">
    
    <div class="" role="document">
        
      <div class="modal-content">
          
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Doing social service?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

         
      
            
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
           
           
      </div>
    </div>
  </div>


</div>

@endsection
