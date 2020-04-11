import { Injectable } from '@angular/core';
import { ToastController } from '@ionic/angular';

@Injectable({
  providedIn: 'root'
})
export class BasicInfoService {


  GOOGLE_MAP_API_KEY : string = "AIzaSyCddu50wUz7VBjih7hwuVeKmiWNVwHDfug";
  INIT_LAN:any =  26.2183;
  INIT_LON:any =  78.1828;
  API_URL:string = "https://gwlcovidfree.in";
  API_TOKEN:string = "abs";

  constructor(public toastController: ToastController) { }

  async presentToast(e:string) {
    const toast = await this.toastController.create({
      message: e,
      duration: 2000
    });
    toast.present();
  }
}
