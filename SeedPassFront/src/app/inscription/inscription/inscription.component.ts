import { NgClass } from '@angular/common';
import { Component, inject } from '@angular/core';
import { FormBuilder, FormGroup, Validators,ReactiveFormsModule, ValidationErrors } from '@angular/forms';
import { Router } from '@angular/router';
import { UserInterface } from '../../interface/user-interface';
import { FamerService } from '../../services/famer.service';
import { ProductorService } from '../../services/productor.service';
import { DistributorService } from '../../services/distributor.service';

@Component({
  selector: 'app-inscription',
  imports: [ReactiveFormsModule,NgClass],
  templateUrl: './inscription.component.html',
  styleUrl: './inscription.component.css'
})
export class InscriptionComponent {
  signupForm: FormGroup;
  famerService=inject(FamerService);
  productorService=inject(ProductorService);
  distributor=inject(DistributorService);
  selectedProfile: string = 'Agriculteur';
  biometric_page=inject(Router)

  constructor(private fb: FormBuilder) {
    this.signupForm = this.fb.group({
      // Informations personnelles
      firstName: ['', Validators.required],
      lastName: ['', Validators.required],
      cni: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],

      // Informations professionnelles
      organisation: [''],
      address: [''],
      phone: [''],
      identificationNumber: [''],

      // Sécurité
      password: ['', Validators.required],
      confirmPassword: ['', Validators.required],

      // Conditions
      isAcceptedCondition: [false, Validators.requiredTrue],
      isAcceptedBiometric: [false]
    });
  }

  setProfile(profile: string) {
    this.selectedProfile = profile;
  }

  onSubmit() {
     let user:UserInterface={
       firstName: '',
       lastName: '',
       profile: '',
       cni: 0,
       email: '',
       organisation: '',
       address: '',
       phone: 0,
       identificationNumber: '',
       password: '',
       isAcceptedCondition: false,
       isAcceptedBiometric: false
     };
    if (this.signupForm.valid) {
      if(this.selectedProfile=='Agriculteur')
      {
          user=this.signupForm.value
          user['profile']=this.selectedProfile
          user['cni']=parseInt(this.signupForm.get('cni')?.value)
          user['phone']=parseInt(this.signupForm.get('phone')?.value)
          console.log('Form submitted',user);
          this.famerService.SaveFamer(user).subscribe(
            (response) => {
              console.log(response);
            }
          )
      }
      else if(this.selectedProfile=='Producteur')
      {
        user=this.signupForm.value
        user['profile']=this.selectedProfile
        user['cni']=parseInt(this.signupForm.get('cni')?.value)
        user['phone']=parseInt(this.signupForm.get('phone')?.value)
        console.log('Form submitted',user);
        this.productorService.SaveProdutor(user).subscribe(
          (response) => {
            console.log(response);
          }
        )
      }
      else
      {
        user=this.signupForm.value
          user['profile']=this.selectedProfile
          user['cni']=parseInt(this.signupForm.get('cni')?.value)
          user['phone']=parseInt(this.signupForm.get('phone')?.value)
          console.log('Form submitted',user);
          this.productorService.SaveProdutor(user).subscribe(
            (response) => {
              console.log(response);
            }
          )
      }
      //console.log('Form submitted',user);
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
