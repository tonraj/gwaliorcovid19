import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { StoremanagerPage } from './storemanager.page';

describe('StoremanagerPage', () => {
  let component: StoremanagerPage;
  let fixture: ComponentFixture<StoremanagerPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ StoremanagerPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(StoremanagerPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
