import { Component, OnInit } from '@angular/core';
import {APIService} from '../api.service';
import { HTTP } from '@ionic-native/http/ngx';
import { NativeStorage } from '@ionic-native/native-storage/ngx';
import { NavController } from '@ionic/angular';
import { Router } from '@angular/router';
import { CallNumber } from '@ionic-native/call-number/ngx';


@Component({
  selector: 'app-store',
  templateUrl: './store.page.html',
  styleUrls: ['./store.page.scss'],
})
export class StorePage implements OnInit {

  status:boolean = false;
  crowd:boolean = true;
  data:any;
  loading:boolean = true;

  constructor(private callNumber: CallNumber, private router: Router, private navCtrl: NavController, private nativeStorage: NativeStorage, private http: HTTP, private api:APIService) { }

  
  call(){
    this.callNumber.callNumber("07512646605", true)
  .then(res => console.log('Launched dialer!', res))
  .catch(err => console.log('Error launching dialer', err));
  }


  store_status(status){

    var status_ = ( status == true) ? "Close" : "Open";

    this.nativeStorage.getItem('login')
  .then(
    data => {
      var  login = data['str'];
      console.log(login);

      this.http.post(this.api.api_url + "/api/statuschange", {

        login:login,
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
    });
    

  }

  crowd_status(status){

    var status_ = ( status == true) ? 0 : 1;
    
    this.nativeStorage.getItem('login')
  .then(
    data => {
      var  login = data['str'];


      this.http.post(this.api.api_url + "/api/statuscrowd", {

        login:login,
        status:status_

      }, {})
      .then(data0 => {

        this.api.presentToast("Crowd status changed.");

      })
      .catch(error => {

    
        this.api.presentToast("Error occurred in changing crowd status please try again.")

      });
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


      this.http.post(this.api.api_url + "/api/store_data", {

        login:login

      }, {})
      .then(data0 => {

        var json = JSON.parse(data0.data);
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
