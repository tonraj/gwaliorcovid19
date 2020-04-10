import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class BasicInfoService {


  GOOGLE_MAP_API_KEY : string = "";
  INIT_LAN:any =  26.2183;
  INIT_LON:any =  78.1828;
  API_URL:string = "https://gwlcovidfree.in";
  API_TOKEN:string = "abs";

  constructor() { }


}
