import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { StoreloginPage } from './storelogin.page';

const routes: Routes = [
  {
    path: '',
    component: StoreloginPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class StoreloginPageRoutingModule {}
