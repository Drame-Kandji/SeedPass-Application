import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ScanSemenceComponent } from './scan-semence.component';

describe('ScanSemenceComponent', () => {
  let component: ScanSemenceComponent;
  let fixture: ComponentFixture<ScanSemenceComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ScanSemenceComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ScanSemenceComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
