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
                  <input class="form-control mb-2" name="link" placeholder="Link" type="text">
                  
                  <textarea class="form-control"  placeholder="Message" name="message"></textarea>
              </p>
              {{csrf_field()}}
              <button name="add" value="add" type="submit" class="btn btn-primary">Save announcement</button>
            </form>
            </div>
          </div>


          <div class="card " >
           
                <table style="margin-bottom:0px;" class="table">
                    <thead>
                      <tr>
                        <th scope="col">Message</th>
                        <th scope="col">Timestamp</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($datas as $qb)
                        <tr>
                        <td><a target="_blank" href="{{$qb->link}}"> {{$qb->message}} </a></td>
                           
                            <td>{{$qb->created_at->format('d, M Y H:i:s')}}</td>
                            <td>
                              
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


@endsection
