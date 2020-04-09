@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        
       
        <div class="col-md-12">
            <div class="row  mb-2">    
                <div class="col-md-4">
                    <form action="" method="get">
                
                    <div class="input-group">
                    <input type="text" value="{{Request::input('query')}}" class="form-control input-sm" name="query" placeholder="Service Title" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary btn-sm" type="submit">Search</button>
                        </div>
                      </div>

                    </form>
                </div>

                <div class="col-md-8">
                   <span class="float-right mt-1"> 
                     
                      <br>
                      <span style="font-size:10px;"> Showing {{$services->count()}} of 
                       {{$services->total()}} </span>
                    </span>
                  
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
              

            
            <div class="card ">
               
               <table style="margin-bottom:0px;" class="table">
                    <thead>
                      <tr>
                        <th>Person Name </th>
                        <th>Title</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>Nearby Police Station</th>
                      
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                        
                        <tr>
                            <td class="align-middle"><a href="#"> {{$service->name}} </a></td>
                            <td class="align-middle">{{$service->title}}</td>
                            <td class="align-middle">{{$service->address}}, <br> {{$service->phone}}</td>
                            
                            <td class="align-middle">{{$service->status}}</td>
                            <td class="align-middle"><a href="#"> {{$service->police->name}} </a></td>
                          
                            <td class="align-middle">
                            @if ($service->status == "Pending" || $service->status == "Rejected" )

                            <a  href="?action=approve&id={{$service->id}}" class="btn btn-primary btn-sm text-white">Approve</a>
                            
                            @else
                            
                            <a  href="?action=reject&id={{$service->id}}" class="btn btn-primary btn-sm text-white">Deny</a>
                            
                            @endif

                            <a target="_blank" href="https://www.google.com/maps/search/?api=1&query={{$service->lat}},{{$service->lon}}" class="btn btn-primary btn-sm text-white"><i  class="fa fa-map-marker"></i></a>
                            <a href="/admin/message?number={{$service->phone}}" class="btn btn-success btn-sm text-white"><i  class="fa fa-envelope"></i></a>
                            <a href="?action=remove&id={{$service->id}}" class=" text-danger ml-3 "><i  class="fa fa-trash"></i></a>
                            
                        
                            </td>
                            </tr>


                        @empty

                        <tr>
                            
                            <td class="align-middle">No service request</td>
                              
                        </tr>
                      
                         @endforelse
                  
                    </tbody>
                  </table>
                
                  <nav class="ml-2 mt-3" aria-label="Page navigation example">
                    {{ $services->links() }}

                  </nav>

                  
            </div>
            
        </div>
    </div>


</div>


@endsection
