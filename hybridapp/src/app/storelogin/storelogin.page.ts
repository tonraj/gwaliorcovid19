import { Component, OnInit } from '@angular/core';

import { BasicInfoService } from '../basic-info.service';
import { HTTP } from '@ionic-native/http/ngx';
import { NativeStorage } from '@ionic-native/native-storage/ngx';
import { NavController } from '@ionic/angular';
import { Router } from '@angular/router';

@Component({
  selector: 'app-storelogin',
  templateUrl: './storelogin.page.html',
  styleUrls: ['./storelogin.page.scss'],
})
export class StoreloginPage implements OnInit {

  login: boolean = false;

  constructor(private router: Router, private navCtrl: NavController, private nativeStorage: NativeStorage, private http: HTTP, private api:BasicInfoService) { 
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
  }

  signIn(phone, password){

    if(phone == null || phone==''){

      this.api.presentToast('Please enter your phone number without 91');

    }else if(password == null || password==''){
      
      this.api.presentToast('Please enter your password');
    
    }else{

      this.login = true;

      this.http.post(this.api.API_URL + "/api/login", {

        phone:phone,
        password:password

      }, {})
      .then(data => {
        console.log(data);

        if(data.status == 200){
          var json = JSON.parse(data.data);
          this.nativeStorage.setItem('login', {str: json['message']})
          .then(
            () => {
              this.router.navigate(['/storemanager']); 
            },
            error => console.error('Error storing item', error)
          );

          
        }

      })
      .catch(error => {

        console.log(error);
        console.log(error.error);

        this.login = false;

        
        if(error.status == 400){
          var json = JSON.parse(error.error);
          this.api.presentToast(json['message']);
        }

      });
      

    }

  }

}
