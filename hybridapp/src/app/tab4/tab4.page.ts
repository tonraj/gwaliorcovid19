import { Component, OnInit } from '@angular/core';
import { Toast } from '@ionic-native/toast/ngx';
import { HTTP } from '@ionic-native/http/ngx';
import { BasicInfoService } from '../basic-info.service';


@Component({
  selector: 'app-tab4',
  templateUrl: './tab4.page.html',
  styleUrls: ['./tab4.page.scss'],
})
export class Tab4Page implements OnInit {

  load : boolean = false;
  data: any;
  count: number = 0;

  constructor(private BasicInfoService: BasicInfoService, private toast: Toast, private http: HTTP) {
    this.messages();
   }

  ngOnInit() {
   
    
  }

  messages(){

    this.http.post(this.BasicInfoService.API_URL +  '/api/announcement', { token: this.BasicInfoService.API_TOKEN }, {})
      .then(data => {
        
        this.data = JSON.parse(data.data);
        this.load = true;
        this.count = this.data.length;
        
      }).catch(error => {

      });


  }


  datef(date){

    var d = new Date(date);


    return d.toISOString().slice(0,10);

  }

}
