import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { StoremanagerPageRoutingModule } from './storemanager-routing.module';

import { StoremanagerPage } from './storemanager.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    StoremanagerPageRoutingModule
  ],
  declarations: [StoremanagerPage]
})
export class StoremanagerPageModule {}
