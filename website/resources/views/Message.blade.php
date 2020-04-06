@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            
        </div>
       
        <div class="col-md-8">
           

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

            <div class="card ">
               
                
           
                <form class="card-body" method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phone Number</label>
                      <input type="number" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phoner number">
                     </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Message</label>
                      <textarea name="message"  class="form-control" id="exampleInputPassword1" placeholder="Message">
                      </textarea>
                    </div>

                    <div class="form-group form-check">
                      <input type="checkbox" name="home" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label"  for="exampleCheck1">Add to Homepage</label>
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">Send Message</button>
                  </form>
               
                  
            </div>
            
        </div>
    </div>


</div>

@endsection
