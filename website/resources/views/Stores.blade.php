@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-2">
            <div class="card ">
            <div class="card-header">Filters</div>
            <div class="card-body">
                
            <form action="" method="get">
                <div class="form-group">
                <label style="font-size: 10px;" for="">Status</label>
                <select name="status" class="form-control">
                    <option value="Active">Active</option>
                </select>
                </div>

                <div class="form-group">
                    <label style="font-size: 10px;" for="">Crowd</label>
                    <select name="crowd" class="form-control">
                        <option value="">Normal</option>
                        <option value="Crowd">Heavy Crowd</option>
                    </select>
                    </div>

                <button type="submit" class="btn btn-primary btn-sm">Apply Filter</button>

            </form>
                
            </div>
        </div>
        </div>
       
        <div class="col-md-10">
            <div class="row  mb-2">    
                <div class="col-md-4">
                    <form action="" method="get">
                
                    <div class="input-group">
                    <input type="text" value="{{Request::input('query')}}" class="form-control input-sm" name="query" placeholder="Store Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary btn-sm" type="submit">Search</button>
                        </div>
                      </div>

                    </form>
                </div>

                <div class="col-md-8">
                   <span class="float-right mt-1"> 
                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary " type="submit">Add Store</button>
                       <form>
                       <input type="hidden" value="{{Request::input('crowd')}}" name="crowd">
                       <input type="hidden" value="{{Request::input('query')}}" name="query">
                       <input type="hidden" value="{{Request::input('status')}}" name="status">
                      </form>
                      <br>
                      <span style="font-size:10px;"> Showing {{$stores->count()}} of 
                       {{$stores->total()}} </span>
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
                        <th>Store Name 
                           </th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Police Station</th>
                        <th>Crowd</th>
                      
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($stores as $store)
                        <tr>
                        <td class="align-middle"><a href="#"> {{$store->shop_name}} </a></td>
                        <td class="align-middle">{{$store->address}}</td>
                        <td class="align-middle">{{$store->current_status}}</td>
                        <td class="align-middle"><a href="#"> {{$store->police->name}} </a></td>
                        <td>
                        @if ($store->crowd == false)
                        <span class="badge badge-success ">Normal Crowd</span>
                        @else
                        <span class="badge badge-danger ">Heavy Crowd</span>
                        @endif
                        </td>

                        <td class="align-middle">
                        <a target="_blank" href="https://www.google.com/maps/search/?api=1&query={{$store->lat}},{{$store->lon}}" class="btn btn-primary btn-sm text-white"><i  class="fa fa-map-marker"></i></a>
                        <a href="/sendmessage?number={{$store->phone_num}}" class="btn btn-success btn-sm text-white"><i  class="fa fa-envelope"></i></a>
                        <a href="?action=remove&id={{$store->id}}" class=" text-danger ml-3 "><i  class="fa fa-trash"></i></a>

                        
                        </td>
                        </tr>

                        @empty

                        <tr>
                            
                            <td class="align-middle">No stores found</td>
                              
                        </tr>
                      
                         @endforelse
                  
                    </tbody>
                  </table>
                
                  <nav class="ml-2 mt-3" aria-label="Page navigation example">
                    {{ $stores->links() }}

                  </nav>

                  
            </div>
            
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Store</h5>
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Shop Name:</label>
                            <input type="text" name="shop" class="form-control" id="email">
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
                  <label for="pwd">Store Address:</label>
                  <textarea class="form-control" name="address" type="text" class="form-control" id="pwd"></textarea>
                </div>

                <div class="form-group">
                    <label for="pwd">Phone Number:</label>
                    <input type="text"  name="phone" class="form-control" id="pwd">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Latitude:</label>
                            <input type="number" name="lat" class="form-control" id="pwd">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Londitude:</label>
                            <input type="number" name="lond" class="form-control" id="pwd">
                            </div>
                    </div>
                </div>

                

               

                <div class="checkbox">
                  <label><input name="sms" type="checkbox"> Send Login Password to Number</label>
                </div>
                {{csrf_field()}}

                <button type="submit" class="btn btn-primary mt-2 btn-block">Save Store</button>
            
            </form>
             
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               
                </div>
           
      </div>
    </div>
  </div>


</div>

<script type="text/javascript">
$(document).ready(function () {

@if ($errors->any())
    $('#exampleModal').modal('show');
@endif
});
</script>
@endsection
