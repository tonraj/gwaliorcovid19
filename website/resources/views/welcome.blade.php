<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/logo_bar_header_mega_min.css" rel="stylesheet">
        <link href="css/theme_min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>


        <header id="immortal_header">
        
    
          
            
            <!--*-*-*-*-*-*-*-*-*-*- Logo Bar *-*-*-*-*-*-*-*-*-*-->
    
            <div class="container-fluid logo_bar_container_fluid">		
                <div class="container">			
                    <div class="row">
                    
                        <!--======= Logo =========-->
                        <div class="col-md-4">
                        
                          <h2> Gwalior Covid19 </h2>
                        
                        </div>
                        
                        <div class="col-md-8">
                        
                            <div class="row">
                                
                                <!--======= Icon =========-->
                                <div class="col-md-1 logo_bar_icons">
                                
                                    <i class="fa fa-phone"></i>
                                
                                </div>
                                
                                <!--======= Phone Number =========-->
                                <div class="col-md-3 logo_bar_phone">
                                
                                    <h5>Emergency No.</h5>
                                    <h6>+ 123 (4) 123.456.789</h6>
                                
                                </div>
    
                                <!--======= Icon =========-->
                                <div class="col-md-1 logo_bar_icons">
    
                                    <i class="fa fa-android"></i>
    
                                </div>
    
                                <!--======= Schedule =========-->
                                <div class="col-md-3 logo_bar_schedule">
    
                                    <h5>Download App</h5>
                                    <h6><a href="#" target="_blank">Android</a></h6>
    
                                </div>
    
                                <!--======= Icon =========-->
                                <div class="col-md-1 logo_bar_icons">
    
                                    <i class="fa fa-hospital-o"></i>
    
                                </div>
    
                                <!--======= Email =========-->
                                <div class="col-md-3 logo_bar_mail">
    
                                    <h5>CONFIRMED CASES</h5>
                                    <h6><a href="#" target="_blank">2</a></h6>
    
                                </div>
    
                            </div>
    
                        </div>
    
                    </div>
    
                </div>
    
            </div>
    
    
    
            <!--*-*-*-*-*-*-*-*-*-*- Modal Sections *-*-*-*-*-*-*-*-*-*-->
    
    
           
        </header> <!--*-*-*-*-*-*-*-*-*-*- End Header Section *-*-*-*-*-*-*-*-*-*-->
        
    
            <div class="container-fluid components_container">
                
                <div class="container">
                    <div class="row ">
               
                    <div class="col-md-10">
                        <h6 class="mt-1">Get details of Consumer Stores in Gwalior City. </h6>
                
                    </div>
                       <div class="col-md-2 ">
                          <button type="button" class="btn btn-default btn-sm">Messages from Nagar Nigam</button>
                       </div>
                    </div>
            
                </div>
                
            </div>
    
            <div class=" ">
                <div class="row">
                <div class="col-md-9">
                 <div style="min-height:500px;" id="map"></div>
                </div>
                <div class="col-md-3">
                   
                <div class="mt-4">
                    <h2 class="mb-4"><i> Break the Chain </i></h2>
                    
                        <li>Always use mask</li>
                        <li>Always keep safe distance.</li>
                        <li>Always wash hands as soon as you reached home.</li>
                   
                    <div  style="color:white;padding:8px;border-radius:2px;background-color:#ed1b24;" class="bg-danger mb-3 mt-3">
                    <h5> 
                        Report Crowd
                    </h5>

                    <small style="font-size:12px;">Your info will remain secret. <br>No personal information will be asked.</small>
                 
                </div>
                    <label>Register if your are :</label>
                    <br>
                        <button class="btn btn-danger btn-sm mt-3">
                            Store Owner
                        </button>
                        <button class="btn btn-danger btn-sm mt-3">
                           doing Social Service
                        </button>
                        <button class="btn btn-danger btn-sm mt-3">
                            Police Officer
                        </button>
                </div>  
                </div>
            </div>
            </div>
     
    </body>

   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>

    function initMap() {
        var myLatLng = {lat: -25.363, lng: 131.044};

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 4,
  center: myLatLng
});

var marker = new google.maps.Marker({
  position: myLatLng,
  map: map,
  title: 'Hello World!'
});
    }
  </script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA678aIy9SFzUqUl_rOd-82CYXx2SaDa8A&callback=initMap"
   async defer></script>
</html>
