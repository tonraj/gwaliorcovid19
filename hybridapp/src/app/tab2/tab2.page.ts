import { Component } from '@angular/core';
import { NativeStorage } from '@ionic-native/native-storage/ngx';
import { Toast } from '@ionic-native/toast/ngx';
import { Diagnostic } from '@ionic-native/diagnostic/ngx';
import { AlertController } from '@ionic/angular';
import {Geolocation} from '@ionic-native/geolocation/ngx';
import { HTTP } from '@ionic-native/http/ngx';
import { CallNumber } from '@ionic-native/call-number/ngx';

@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {

  info:boolean = true;

  constructor(private callNumber: CallNumber, private http: HTTP, public geolocation: Geolocation,  private toast: Toast, private nativeStorage: NativeStorage, private diagnostic: Diagnostic, public alertController: AlertController) {

  this.nativeStorage.getItem('userinfo')
    .then(
      data => {
        
        this.info = true;
      
      },
      error => {
        this.info = false;
      }
    );

  }

  save(name, phone ){

    console.log(phone, name);
    
    if(name==null || name==''){

      this.toast.showLongBottom('Please enter your name').subscribe();

    }else if(phone==null || phone.toString().length!=10){

      this.toast.showLongBottom('Please your 10 digit phone number').subscribe(
        toast => {
          console.log(toast);
        }
      );

    }else{


      this.nativeStorage.setItem('userinfo', {name: name, phone: phone})
  .then(
    () => {
      this.info = true;
    },
    error => console.error('Error storing item', error)
  );

    }
  }


  emergency(){

    
    this.nativeStorage.getItem('userinfo')
    .then(
      data => {


        this.diagnostic.isGpsLocationEnabled()
						.then((state) => {
						  if (!state){

                this.presentAlertConfirm();
							
							}else{

                this.geolocation.getCurrentPosition().then((position) =>  {
                  var lat = position.coords.latitude;
                  var lng = position.coords.longitude;
                  var name = data.name;
                  var number = data.phone;

                  this.toast.showLongBottom('Sending emergency request please wait.').subscribe();


                  this.http.post('http://192.168.1.8:8000/api/emergency', {
                    lan: lat,
                    token: "abs",
                    lon: lng,
                    name: name,
                    number: number
                  
                  }, {})
                  .then(data => {
                    
                    
                    if(data.status == 200){

                      this.toast.showLongBottom('Emergency request sent, We will contact you asap.').subscribe();
                      

                    }



                  }).catch(error => {

                    if(error.status == 200){

                      this.toast.showLongBottom('Invalid Action').subscribe();
                      

                    }


                  });


              });
							

							}

							});
        
        
        
      
      },
      error => {
        
        this.toast.showLongBottom('Please fill your info first').subscribe(
          toast => {
            console.log(toast);
          }
        );
        
      }
    );


  }

  async presentAlertConfirm() {
    const alert = await this.alertController.create({
      header: '<b>Location</b>',
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

  call(){
    this.callNumber.callNumber("07512646605", true)
  .then(res => console.log('Launched dialer!', res))
  .catch(err => console.log('Error launching dialer', err));
  }
}
