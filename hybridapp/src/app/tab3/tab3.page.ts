import { Component } from '@angular/core';
import { Toast } from '@ionic-native/toast/ngx';
import { HTTP } from '@ionic-native/http/ngx';

@Component({
  selector: 'app-tab3',
  templateUrl: 'tab3.page.html',
  styleUrls: ['tab3.page.scss']
})

export class Tab3Page {

  constructor(private toast: Toast, private http: HTTP) {}

  save(message:string){

    if(message==null || message==''){

      this.toast.showLongBottom('Please type the message first.').subscribe();

    }else{

      this.toast.showLongBottom('Sending crowd report message please wait.').subscribe();


      this.http.post('http://192.168.1.8:8000/api/report_crowd', {
        message: message,
        token: "ab"
      
    }, {})
      .then(data => {
        
        if(data.status == 200){

          this.toast.showLongBottom('Crowd Report has been sent to authority.').subscribe();

        }
        

      }).catch(error => {


        if(error.status == 400){

          this.toast.showLongBottom('Invalid Action').subscribe();

        }

      });

    }


  }

}
