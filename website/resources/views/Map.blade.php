@extends('layouts.app')

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

   <div class="row ">
     <div class="col-md-6">




        <div class="card " >
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
                      <input class="form-control mb-2" id="lat" name="lan" placeholder="Latitude" type="text">
                  
                    </div>
                    <div class="col-md-6">
                      <input class="form-control mb-2" id="lon" name="lon" placeholder="Longitude" type="text">
                  
                    </div>
                    
                  </div>
                  <textarea class="form-control"  placeholder="Address" name="address"></textarea>
              </p>
              {{csrf_field()}}
              <button name="add" value="add" type="submit" class="btn btn-primary">Add to Map</button>
            </form>
            </div>
          </div>

   </div>

   <div class="col-md-6">

    <div class="card" >
      <h5 class="card-header small bg-dark text-white">Drop point to Map</h5>

    <div style="height:327px;" id="gmap"></div>
    </div>


   </div>


  </div>
  <div class="card mt-4" >
           
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

<script>

        var map;
        function initialize() {
            var myLatlng = new google.maps.LatLng(26.2183, 78.1828);
            var myOptions = {
                zoom:12,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("gmap"), myOptions);
            

            google.maps.event.addListener(map, "click", function(event) {
                // get lat/lon of click
                var clickLat = event.latLng.lat();
                var clickLon = event.latLng.lng();

                // show in input box
                document.getElementById("lat").value = clickLat.toFixed(5);
                document.getElementById("lon").value = clickLon.toFixed(5);

                  var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(clickLat,clickLon),
                        map: map
                     });
            });
    }   

 
</script>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA678aIy9SFzUqUl_rOd-82CYXx2SaDa8A&callback=initialize"
   async defer></script>


@endsection
