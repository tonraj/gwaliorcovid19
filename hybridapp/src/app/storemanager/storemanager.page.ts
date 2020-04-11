import { Component, OnInit } from '@angular/core';
import { BasicInfoService } from '../basic-info.service';
import { HTTP } from '@ionic-native/http/ngx';
import { NativeStorage } from '@ionic-native/native-storage/ngx';
import { NavController } from '@ionic/angular';
import { Router } from '@angular/router';
import { CallNumber } from '@ionic-native/call-number/ngx';

@Component({
  selector: 'app-storemanager',
  templateUrl: './storemanager.page.html',
  styleUrls: ['./storemanager.page.scss'],
})
export class StoremanagerPage implements OnInit {
  
  status:boolean = false;
  crowd:boolean = true;
  data:any;
  loading:boolean = true;
  str:string = "";


  constructor(private callNumber: CallNumber, private router: Router, private navCtrl: NavController, private nativeStorage: NativeStorage, private http: HTTP, private api:BasicInfoService) { }

  call(){
    this.callNumber.callNumber("07512646605", true)
  .then(res => console.log('Launched dialer!', res))
  .catch(err => console.log('Error launching dialer', err));
  }


  store_status(status){

    var status_ = ( status == true) ? "Close" : "Open";

    this.http.post(this.api.API_URL + "/api/statuschange", {

      login:this.str,
      status:status_

    }, {})
    .then(data0 => {

      console.log(data0.data);
      this.api.presentToast("Store status changed.");

    })
    .catch(error => {

      console.log(error.error);
  
      this.api.presentToast("Error occurred in changing Store status please try again.")

    });

  }

  crowd_status(status){

    var status_ = ( status == true) ? 0 : 1;
    
    this.http.post(this.api.API_URL + "/api/statuscrowd", {

      login:this.str,
      status:status_

    }, {})
    .then(data0 => {

      this.api.presentToast("Crowd status changed.");

    })
    .catch(error => {

  
      this.api.presentToast("Error occurred in changing crowd status please try again.")

    });



  }


  ngOnInit() {
    this.getStore();
  }


  getStore(){

    this.nativeStorage.getItem('login')
  .then(
    data => {
      var  login = data['str'];

      this.str = login;

      this.http.post(this.api.API_URL + "/api/store_data", {

        login:login

      }, {})
      .then(data0 => {

        var json = JSON.parse(data0.data);
        
        if(json['data'] == null){

          this.nativeStorage.remove('login').then(() =>{});
          this.router.navigate(['/storelogin']);
        }
        
        this.data = json['data'];
        if (json['data']['crowd'] == 0){
          this.crowd = false;
        }else{
          this.crowd = true;
        }

        if (json['data']['current_status'] == "Open"){
          this.status = true;
        }else{
          this.status = false;
        }

        this.loading = false;

      })
      .catch(error => {

    

      });




    },
    error => {
      this.navCtrl.setDirection('root');
      this.router.navigate(['/home']); 
    }
  );


  }

}
