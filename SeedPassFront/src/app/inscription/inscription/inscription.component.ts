import { NgClass } from '@angular/common';
import { Component, inject } from '@angular/core';
import { FormBuilder, FormGroup, Validators,ReactiveFormsModule, ValidationErrors } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-inscription',
  imports: [ReactiveFormsModule,NgClass],
  templateUrl: './inscription.component.html',
  styleUrl: './inscription.component.css'
})
export class InscriptionComponent {
  signupForm: FormGroup;
  selectedProfile: string = 'Agriculteur';
  biometric_page=inject(Router)

  constructor(private fb: FormBuilder) {
    this.signupForm = this.fb.group({
      // Informations personnelles
      lastName: ['', Validators.required],
      firstName: ['', Validators.required],
      cni: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],

      // Informations professionnelles
      organization: [''],
      address: [''],
      telephone: [''],
      identificationNumber: [''],

      // Sécurité
      password: ['', Validators.required],
      confirmPassword: ['', Validators.required],

      // Conditions
      acceptTerms: [false, Validators.requiredTrue],
      allowDataCollection: [false]
    });
  }

  setProfile(profile: string) {
    this.selectedProfile = profile;
  }

  onSubmit() {
    if (this.signupForm.valid) {
      console.log('Form submitted', this.signupForm.value);
      this.biometric()
      // Implement signup logic here
    } else {
      // Mark all fields as touched to trigger validation messages
      Object.keys(this.signupForm.controls).forEach(key => {
        this.signupForm.get(key)?.markAsTouched();
      });
    }

  }

  biometric()
  {
    this.biometric_page.navigateByUrl('reconnaissanceFacial')
  }

 /*  onLog()
  {
    console.log('Form submitted:', this.loginForm.value);
      console.log(this.loginForm.get('profil')?.errors)
      this.passwordError=this.loginForm.get('profil')?.errors?.['required'];
      console.log(this.passwordError?.['required']);

  } */
}
