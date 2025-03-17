import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SeedVerificationComponent } from './seed-verification.component';

describe('SeedVerificationComponent', () => {
  let component: SeedVerificationComponent;
  let fixture: ComponentFixture<SeedVerificationComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [SeedVerificationComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SeedVerificationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
