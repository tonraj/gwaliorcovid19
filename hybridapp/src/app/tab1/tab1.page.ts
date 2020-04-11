import { Component , ElementRef, NgZone, ViewChild} from '@angular/core';
import {Geolocation} from '@ionic-native/geolocation/ngx';
import { HTTP } from '@ionic-native/http/ngx';
import { Diagnostic } from '@ionic-native/diagnostic/ngx';
import { AlertController } from '@ionic/angular';
import { BasicInfoService } from '../basic-info.service';
import { Router } from '@angular/router';
import { NativeStorage } from '@ionic-native/native-storage/ngx';

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
    location = {lat: this.BasicInfoService.INIT_LAN, lng: this.BasicInfoService.INIT_LON};
    markerOptions: any = {position: null, map: null, title: null};
    marker: any;
  
    data:any[] =  [];

  constructor(private nativeStorage: NativeStorage,private router: Router, private BasicInfoService: BasicInfoService, private diagnostic: Diagnostic, public alertController: AlertController, public zone: NgZone, public geolocation: Geolocation, private http: HTTP) {
    
    
  }


  manager(){

    this.nativeStorage.getItem('login')
      .then(
        data => {
          
          this.router.navigate(['/storemanager']); 

          
        },
        error => {
          
          this.router.navigate(['/storelogin']); 

        }
      );


  }

  ngOnInit() {
   
      const script = document.createElement('script');
      
      script.id = 'googleMap';
      script.src = 'https://maps.googleapis.com/maps/api/js?key=' + this.BasicInfoService.GOOGLE_MAP_API_KEY;
      
      
      document.head.appendChild(script);

      this.diagnostic.isGpsLocationEnabled()
      .then((state) => {
        if (!state){

          this.presentAlertConfirm();
        
        }else{

          this.geolocation.getCurrentPosition().then((position) =>  {
            this.location.lat = position.coords.latitude;
            this.location.lng = position.coords.longitude;
        });
        

        }

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
          
          this.marker = new google.maps.Marker(this.markerOptions);
          this.setMarkers(this.map);

        
      }, 3000);

      

   

      
  }

  
   setMarkers(map){

    this.http.get(this.BasicInfoService.API_URL + '/api/map', {}, {})
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

async presentAlertConfirm() {
  const alert = await this.alertController.create({
    header: 'Location',
    message: 'Location information is unavaliable on this device. Go to Settings to enable Location.',
    buttons: [
      {
        text: 'Cancel',
        role: 'cancel',
        cssClass: 'secondary',
        handler: (blah) => {
          console.log('Confirm Cancel: blah');
        }
      }, {
        text: 'Go to settings',
        handler: () => {
          this.diagnostic.switchToLocationSettings()
        }
      }
    ]
  });

  await alert.present();
}

}
