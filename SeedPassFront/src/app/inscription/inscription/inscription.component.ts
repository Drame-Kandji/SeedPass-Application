import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators,ReactiveFormsModule, ValidationErrors } from '@angular/forms';

@Component({
  selector: 'app-inscription',
  imports: [ReactiveFormsModule],
  templateUrl: './inscription.component.html',
  styleUrl: './inscription.component.css'
})
export class InscriptionComponent {
  loginForm: FormGroup;
  passwordError:ValidationErrors|null|undefined=null;
  constructor(private fb: FormBuilder) {
    this.loginForm = this.fb.group({
      prenom:['',Validators.required],
      nom: ['', Validators.required],
      profil:['',Validators.required],
      numeroCNI:['',Validators.required],
      emailOrPhone: ['', Validators.required],
      telephone:['',Validators.required],
      password: ['', Validators.required],
      Confirmpassword:['',Validators.required],
      rememberMe: [false]
    });
  }

  onSubmit() {
    if (this.loginForm.valid) {
      console.log('Form submitted:', this.loginForm.value);
      console.log(this.loginForm.get('profil')?.errors)
    }
  }

  onLog()
  {
    console.log('Form submitted:', this.loginForm.value);
      console.log(this.loginForm.get('profil')?.errors)
      this.passwordError=this.loginForm.get('profil')?.errors?.['required'];
      console.log(this.passwordError?.['required']);

  }
}
