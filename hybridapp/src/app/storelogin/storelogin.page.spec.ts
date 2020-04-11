import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { StoreloginPage } from './storelogin.page';

describe('StoreloginPage', () => {
  let component: StoreloginPage;
  let fixture: ComponentFixture<StoreloginPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ StoreloginPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(StoreloginPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
