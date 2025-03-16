import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators,ReactiveFormsModule} from '@angular/forms';
import { DatePipe, NgClass, NgStyle, UpperCasePipe } from '@angular/common';
import { InscriptionComponent } from "../../inscription/inscription/inscription.component";
import { FeaturesComponent } from "../../features/features/features.component";


@Component({
  selector: 'app-login',
  imports: [NgClass, ReactiveFormsModule, InscriptionComponent, FeaturesComponent],
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {
  loginForm: FormGroup;
  activeTab: string = 'connexion';

  constructor(private fb: FormBuilder) {
    this.loginForm = this.fb.group({
      emailOrPhone: ['', Validators.required],
      password: ['', Validators.required],
      rememberMe: [false]
    });
  }

  setActiveTab(tab: string) {
    this.activeTab = tab;
  }

  onSubmit() {
    if (this.loginForm.valid) {
      console.log('Form submitted:', this.loginForm.value);
    }
  }
}
