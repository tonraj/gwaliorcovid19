import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { StoremanagerPage } from './storemanager.page';

const routes: Routes = [
  {
    path: '',
    component: StoremanagerPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class StoremanagerPageRoutingModule {}
