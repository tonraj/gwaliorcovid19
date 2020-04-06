import { Component , ElementRef, NgZone, ViewChild} from '@angular/core';
import {Geolocation} from '@ionic-native/geolocation/ngx';
import { HTTP } from '@ionic-native/http/ngx';

declare var google: any;

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {

    @ViewChild('Map', {static: true}) mapElement: ElementRef;
    map: any;
    mapOptions: any;
    location = {lat: 26.2183, lng: 78.1828};
    markerOptions: any = {position: null, map: null, title: null};
    marker: any;
    apiKey: any = 'AIzaSyA678aIy9SFzUqUl_rOd-82CYXx2SaDa8A'; 
    
    data:any[] =  [];

  constructor(public zone: NgZone, public geolocation: Geolocation, private http: HTTP) {

    

      const script = document.createElement('script');
      
      script.id = 'googleMap';
      
      if (this.apiKey) {
          script.src = 'https://maps.googleapis.com/maps/api/js?key=' + this.apiKey;
      } else {
          script.src = 'https://maps.googleapis.com/maps/api/js?key=';
      }
      
      document.head.appendChild(script);
      
      this.geolocation.getCurrentPosition().then((position) =>  {
          this.location.lat = position.coords.latitude;
          this.location.lng = position.coords.longitude;
      });
      
      
      this.mapOptions = {
          center: this.location,
          zoom: 12,
          mapTypeControl: false
      };
      
      
      setTimeout(() => {
        
          this.map = new google.maps.Map(this.mapElement.nativeElement, this.mapOptions);
          this.markerOptions.position = this.location;
          this.markerOptions.map = this.map;
          this.markerOptions.title = 'My Location';
          //this.markerOptions.icon = 'My Location';
          this.marker = new google.maps.Marker(this.markerOptions);
          this.setMarkers(this.map);

        
      }, 3000);

      

      //this.setMarkers(this.map, this.data);
  


  }

   setMarkers(map){

    this.http.get('http://192.168.1.8:8000/api/map', {}, {})
  .then(data => {

    var locations = JSON.parse(data.data);
  
    var marker, i;

    for (i = 0; i < locations.length; i++)
    {  
  
    var loan = locations[i][0]
    var lat = locations[i][1]
    var long = locations[i][2]
    var add =  locations[i][3]
    var image = locations[i][4]

    console.log(image);
  
    var latlngset = new google.maps.LatLng(lat, long);
  
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

  })
  .catch(error => {

    console.log(error.status);
    console.log(error.error); // error message as string
    console.log(error.headers);

  });

    
    
  
}

}
