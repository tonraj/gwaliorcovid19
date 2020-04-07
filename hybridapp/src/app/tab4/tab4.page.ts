import { Component, OnInit } from '@angular/core';
import { Toast } from '@ionic-native/toast/ngx';
import { HTTP } from '@ionic-native/http/ngx';


@Component({
  selector: 'app-tab4',
  templateUrl: './tab4.page.html',
  styleUrls: ['./tab4.page.scss'],
})
export class Tab4Page implements OnInit {

  load : boolean = false;
  data: any;
  count: number = 0;

  constructor(private toast: Toast, private http: HTTP) {
    this.messages();
   }

  ngOnInit() {
   
  }

  messages(){

    this.http.post('http://192.168.1.8:8000/api/announcement', { token: "abs" }, {})
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
