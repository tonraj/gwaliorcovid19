import { Component } from '@angular/core';
import {APIService} from '../api.service';
import { HTTP } from '@ionic-native/http/ngx';
import { NativeStorage } from '@ionic-native/native-storage/ngx';
import { NavController } from '@ionic/angular';
import { Router } from '@angular/router';


@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {


  login: boolean = false;

  constructor( private router: Router, private navCtrl: NavController, private nativeStorage: NativeStorage, private http: HTTP, private api:APIService) {

    this.nativeStorage.getItem('login')
      .then(
        data => {
          
          
          this.navCtrl.setDirection('root');
          this.router.navigate(['/store']); 

          
        },
        error => {
          
          console.log("hgfhg")

        }
      );
    
  }


  signIn(phone, password){

    if(phone == null || phone==''){

      this.api.presentToast('Please enter your phone number without 91');

    }else if(password == null || password==''){
      
      this.api.presentToast('Please enter your password');
    
    }else{

      this.login = true;

      this.http.post(this.api.api_url + "/api/login", {

        phone:phone,
        password:password

      }, {})
      .then(data => {

        if(data.status == 200){
          var json = JSON.parse(data.data);
          this.nativeStorage.setItem('login', {str: json['message']})
          .then(
            () => {
              this.navCtrl.setDirection('root');
              this.router.navigate(['/store']); 
            },
            error => console.error('Error storing item', error)
          );

          
        }

      })
      .catch(error => {

        this.login = false;

        
        if(error.status == 400){
          var json = JSON.parse(error.error);
          this.api.presentToast(json['message']);
        }

      });
      

    }

  }


}
