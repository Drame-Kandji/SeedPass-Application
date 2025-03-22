import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AutoriteControleComponent } from './autorite-controle.component';

describe('AutoriteControleComponent', () => {
  let component: AutoriteControleComponent;
  let fixture: ComponentFixture<AutoriteControleComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AutoriteControleComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AutoriteControleComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
