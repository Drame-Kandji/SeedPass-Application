import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SemenceRegistrationComponent } from './semence-registration.component';

describe('SemenceRegistrationComponent', () => {
  let component: SemenceRegistrationComponent;
  let fixture: ComponentFixture<SemenceRegistrationComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [SemenceRegistrationComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SemenceRegistrationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
