import { Component, computed } from '@angular/core';
import { RouterLink } from '@angular/router';
import { ProfileService } from '../../services/profile.service';

@Component({
  selector: 'app-call-to-action',
  imports: [RouterLink],
  templateUrl: './call-to-action.component.html',
  styleUrl: './call-to-action.component.css'
})
export class CallToActionComponent {
  profile;
   constructor(private profileService:ProfileService){
     this.profile=computed(()=>{
      return this.profileService.profile()
     })
   }
}
