import { Component, computed } from '@angular/core';
import { RouterLink } from '@angular/router';
import { ProfileService } from '../../services/profile.service';

@Component({
  selector: 'app-hero-section',
  imports: [RouterLink],
  templateUrl: './hero-section.component.html',
  styleUrl: './hero-section.component.css'
})
export class HeroSectionComponent {
  profile;
 constructor(private profileService:ProfileService){
   this.profile=computed(()=>{
    return this.profileService.profile()
   })
 }
}
