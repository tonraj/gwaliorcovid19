import { Component } from '@angular/core';
import { Toast } from '@ionic-native/toast/ngx';
import { HTTP } from '@ionic-native/http/ngx';
import { BasicInfoService } from '../basic-info.service';


@Component({
  selector: 'app-tab3',
  templateUrl: 'tab3.page.html',
  styleUrls: ['tab3.page.scss']
})

export class Tab3Page {

  constructor(private BasicInfoService: BasicInfoService, private toast: Toast, private http: HTTP) {}

  save(message:string){

    if(message==null || message==''){

      this.toast.showLongBottom('Please type the message first.').subscribe();

    }else{

      this.toast.showLongBottom('Sending crowd report message please wait.').subscribe();


      this.http.post(this.BasicInfoService.API_URL + '/api/report_crowd', {
        message: message,
        token: this.BasicInfoService.API_TOKEN
      
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
