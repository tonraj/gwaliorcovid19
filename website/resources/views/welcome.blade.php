<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gwalior CovidFree - Essential Map, Info and Crowd Reporting.</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/logo_bar_header_mega_min.css" rel="stylesheet">
        <link href="css/theme_min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <style>
  
        .footer-classic a, .footer-classic a:focus, .footer-classic a:active {
            color: #ffffff;
        }

        .social-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            padding: 23px;
            font: 900 13px/1 "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.5);
        }
    </style>
    </head>
    <body>


        <header id="immortal_header">
        
    
          
      
            <div class="container-fluid logo_bar_container_fluid">		
                <div class="container">			
                    <div class="row">
                    
                        <div class="col-md-4">
                        
                          <h2> Gwalior CovidFree </h2>
                         
                        
                        </div>
                        
                        <div class="col-md-8">
                        
                            <div class="row">
                                
                                <div class="col-md-1 logo_bar_icons">
                                
                                    <i class="fa fa-phone"></i>
                                
                                </div>
                                
                                <div class="col-md-3 logo_bar_phone">
                                
                                    <h5>Helpine No.</h5>
                                    <h6>{{$data['helpline']}}</h6>
                                
                                </div>
    
                                 <div class="col-md-1 logo_bar_icons">
    
                                    <i class="fa fa-android"></i>
    
                                </div>
    
                               <div class="col-md-3 logo_bar_schedule">
    
                                    <h5>Download App</h5>
                                    <h6><a href="/download">Android</a></h6>
    
                                </div>
    
                               <div class="col-md-1 logo_bar_icons">
    
                                    <i class="fa fa-hospital-o"></i>
    
                                </div>
    
                                <div class="col-md-3 logo_bar_mail">
    
                                    <h5>CONFIRMED CASES</h5>
                                    <h6>{{$data['cases']}}</h6>
    
                                </div>
    
                            </div>
    
                        </div>
    
                    </div>
    
                </div>
    
            </div>
    
    
    
    
           
        </header>
        
    
            <div class="container-fluid components_container">
                
                <div class="container">
                    <div class="row ">
               
                    <div class="col-md-10">
                        <h6 class="mt-1">Gwalior essential store Map. </h6>
                
                    </div>
                       <div class="col-md-2 ">
                          <button type="button" data-toggle="modal" data-target="#announcement" class="btn btn-default btn-sm">Announcements</button>
                       </div>
                    </div>
            
                </div>
                
            </div>
    
            <div class="container ">
                <div class="row">
                <div class="col-md-9">
                 <div style="min-height:600px;" id="map"></div>
                </div>
                <div class="col-md-3 mb-4">
                   
                <div class="mt-4">
                    <h2 class="mb-4"><i> Break the Chain </i></h2>
                    
                        <li>Always use mask</li>
                        <li>Always keep safe distance.</li>
                        <li>Always wash hands as soon as you reached home.</li>
                   
                    <div  style="color:white;padding:8px;border-radius:2px;background-color:#ed1b24;" class="bg-danger mb-3 mt-3">
                    <h5> 
                        <a href="/report" class="text-white"> Report Crowd </a>
                        
                    </h5>

                    <small style="font-size:12px;">Your info will remain secret. <br>No personal information will be asked.</small>
                 
                </div>
                    <label>Register if your are :</label>
                    <br>
                        
                        <a href="/register/store" class="btn btn-danger btn-sm mt-3">
                            Store Owner
                        </a>
                        
                        <a href="/register/socialservice" class="btn btn-danger btn-sm mt-3">
                           doing Social Service
                        </a>
                        
                        <a href="/register/officer" class="btn btn-danger btn-sm mt-3">
                            Police Officer
                        </a>
                </div>  
                </div>
            </div>

            
            </div>
     

            <footer class="section footer-classic context-dark bg-image" style="background: #ed1b24;">
                <div class="container ">
                  
                <div class="row no-gutters social-container">
                  <div class="col"><a class="social-inner" href="https://github.com/tonraj/gwaliorcovid19"><span class="icon mdi mdi-facebook"></span><span>Github</span></a></div>
                  <div class="col"><a class="social-inner" href="https://gwalior.nic.in/"><span class="icon mdi mdi-instagram"></span><span>Gwalior Nagar Nigam</span></a></div>
                  <div class="col"><a class="social-inner" href="https://www.mohfw.gov.in/"><span class="icon mdi mdi-twitter"></span><span>MoHFW</span></a></div>
                </div>
              </footer>


            <div class="modal fade" id="announcement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Announcements</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      @foreach ($announcemnets as $message)
                            <li> <a href="{{$message->link}}"> {{$message->message}} </a></li>
                      @endforeach
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>


    </body>

   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">

      function initialize() {

        var myOptions = {
          center: new google.maps.LatLng(26.2183, 78.1828),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
    
        };
        var map = new google.maps.Map(document.getElementById("map"),
            myOptions);

        $.get("/api/map", function(data, status){
          
            setMarkers(map,data);
        });
    
        
    
        
    
      }
    
    
    
      function setMarkers(map,locations){
    
          var marker, i;
    
    for (i = 0; i < locations.length; i++)
     {  
    
     var loan = locations[i][0]
     var lat = locations[i][1]
     var long = locations[i][2]
     var add =  locations[i][3]
     var image = locations[i][4]
    
     latlngset = new google.maps.LatLng(lat, long);
    
            var marker = new google.maps.Marker({  
              map: map, title: loan , position: latlngset, icon: image
            });

            map.setCenter(marker.getPosition())
    
    
            var content = "<h6>" + loan +  '</h6>' + "" + add     
    
      var infowindow = new google.maps.InfoWindow()
    
    google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
            return function() {
               infowindow.setContent(content);
               infowindow.open(map,marker);
            };
        })(marker,content,infowindow)); 
    
      }
      }
    
    
    
      </script>
   <script src="https://maps.googleapis.com/maps/api/js?key={GOOGLE_MAP_API_KEY}&callback=initialize"
   async defer></script>
</html>
