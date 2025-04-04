import { Component, inject } from '@angular/core';
import { FormBuilder, FormGroup, Validators,ReactiveFormsModule} from '@angular/forms';
import { Router } from '@angular/router';
import { FamerService } from '../../services/famer.service';
import { Sucess } from '../../interface/sucess';
import { ProductorService } from '../../services/productor.service';
import { DistributorService } from '../../services/distributor.service';
import { ProfileService } from '../../services/profile.service';


@Component({
  selector: 'app-login',
  imports: [ReactiveFormsModule],
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {
  loginForm: FormGroup;
  loginF=inject(FamerService);
  loginP=inject(ProductorService)
  loginD=inject(DistributorService)
  activeTab: string = 'connexion';
  home=inject(Router)
  profile!:string;
  profileService=inject(ProfileService)

  constructor(private fb: FormBuilder) {
    this.loginForm = this.fb.group({
      email: ['', Validators.required],
      password: ['', Validators.required],
      //rememberMe: [false]
    });
  }
  setActiveTab(tab: string) {
    this.activeTab = tab;
  }

  onSubmit() {
    if (this.loginForm.valid) {
      console.log('Form submitted:', this.loginForm.value);
      this.loginF.login(this.loginForm.value).subscribe(
        (response:Sucess)=>{
         console.log(response);
          this.profile=response.profile;
          console.log(this.profile);
          if(this.profile=="Agriculteur"){
            this.home.navigate(['/Agricultor']);
            this.profileService.profile.set(this.profile)
          }
          else if(this.profile=="Producteur"){
            this.home.navigate(['/productor']);
            this.profileService.profile.set(this.profile)
          }
          else if(this.profile=="Distributeur"){
            this.home.navigate(['/distributor']);
            this.profileService.profile.set(this.profile)
          }
          else
          {
             this.home.navigate(['/connexion']);
          }
        }
      );
    }
  }
}
