@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row ">
    <div class="col-md-1"></div>
     <div class="col-md-10">


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



        <div class="card mb-2" >
          <h5 class="card-header small bg-dark text-white">Add Map</h5>
            <div class="card-body">
              
              <p class="card-text">
                <form action="" method="post" action="">
                  <input class="form-control mb-2" name="title" placeholder="Title" type="text">
                  <select name="icon" class="form-control mb-2" placeholder="dsads">
                    <option selected disabled>Icon</option>
                    <option value="Shelter">Shelter</option>
                    <option value="Hospital">Hospital</option>
                    
                  </select>
                 
                  <div class="row">
                    <div class="col-md-6">
                      <input class="form-control mb-2" name="lan" placeholder="Latitude" type="text">
                  
                    </div>
                    <div class="col-md-6">
                      <input class="form-control mb-2" name="lon" placeholder="Londitude" type="text">
                  
                    </div>
                    
                  </div>
                  <textarea class="form-control"  placeholder="Address" name="address"></textarea>
              </p>
              {{csrf_field()}}
              <button name="add" value="add" type="submit" class="btn btn-primary">Add to Map</button>
            </form>
            </div>
          </div>


          <div class="card " >
           
                <table style="margin-bottom:0px;" class="table">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Address</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($mapdatas as $qb)
                        <tr>
                            <td>{{$qb->title}}</td>
                            <td>
                              @if ($qb->status == 0 )
    
                                Closed

                                @else

                                Open

                                @endif
    
                                
                            
                                </td>
                            </td>
                            <td>{{$qb->address}}</td>
                            <td>
                              @if ($qb->status == 0 )
    
                              <a href="?action=open&id={{$qb->id}}" class="btn btn-primary btn-sm text-white">Open</a>

                                @else
                            <a href="?action=close&id={{$qb->id}}" class="btn btn-primary btn-sm text-white">Close</a>
                                @endif
    
                                <a target="_blank" href="https://www.google.com/maps/search/?api=1&amp;query={{$qb->lan}},{{$qb->lon}}" class="btn btn-primary btn-sm text-white"><i class="fa fa-map-marker"></i></a>
                                <a href="?action=remove&id={{$qb->id}}" class=" text-danger ml-3 "><i class="fa fa-trash"></i></a>
                            
                                </td>
                              
                            </td>
                          </tr>

                      @empty

                        <tr>
                            
                            <td class="align-middle">No data</td>
                              
                        </tr>
                      
                         @endforelse
                      
                    </tbody>
                  </table>
          
          </div>
   </div>
  </div>
</div>

<div id="exampleModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
           
          <h5 class="modal-title">Update Question Bank</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post">
        <div class="modal-body">
            <input  id="gid" name="gid" type="hidden">
            <input class="form-control mb-2" name="name" id="name" type="text">
            <input class="form-control mb-2" name="category" id="category" type="text">
            <textarea class="form-control" name="description" id="description"></textarea>
            {{csrf_field()}}
        </div>
        <div class="modal-footer">
          <button type="submit" name="update" value="update" class="btn btn-primary">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <script>
      function updateModel(id, name, category, description){
          console.log(name);
          $('#name').val(name);
          $('#gid').val(id);
          $('#category').val(category);
          $('#description').val(description);
          $('#exampleModal').modal('show');

      }
  </script>

@endsection
