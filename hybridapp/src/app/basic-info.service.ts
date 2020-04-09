import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class BasicInfoService {


  GOOGLE_MAP_API_KEY : string = "AIzaSyA678aIy9SFzUqUl_rOd-82CYXx2SaDa8A";
  INIT_LAN:any =  26.2183;
  INIT_LON:any =  78.1828;
  API_URL:string = "http://192.168.1.8:8000";
  API_TOKEN:string = "abs";

  constructor() { }


}
