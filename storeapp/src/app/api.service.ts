import { Injectable } from '@angular/core';
import { ToastController } from '@ionic/angular';

@Injectable({
  providedIn: 'root'
})
export class APIService {

  api_url: string = "https://gwlcovidfree.in";

  constructor(public toastController: ToastController) { }

  async presentToast(e:string) {
    const toast = await this.toastController.create({
      message: e,
      duration: 2000
    });
    toast.present();
  }
}
