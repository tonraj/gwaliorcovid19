import { Component } from '@angular/core';
import { NativeStorage } from '@ionic-native/native-storage/ngx';
import { Toast } from '@ionic-native/toast/ngx';

@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {

  info:boolean = true;

  constructor(private toast: Toast, private nativeStorage: NativeStorage) {


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

}
