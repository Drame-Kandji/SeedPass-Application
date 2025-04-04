import { NgFor } from '@angular/common';
import { Component, computed, OnInit } from '@angular/core';
import { routes } from '../../app.routes';
import { RouterLink, RouterLinkActive} from '@angular/router';
import { ProfileService } from '../../services/profile.service';

@Component({
  selector: 'app-header',
  imports:[NgFor,RouterLink,RouterLinkActive],
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  profile;
  route:string='';
  constructor(private profileService:ProfileService){
    this.profile=computed(()=>{
      return profileService.profile()
    })
  }

  ngOnInit(): void {
    if(this.profile())
    {
      this.route='/inscription'
    }
    else{
      this.route='/connexion'
    }
  }
  title = 'SeedPass';
  subtitle = 'La traçabilité au service de l\'agriculture africaine';
  menuItems = [
    { label: 'Accueil', link: '/' },
    { label: 'À propos', link: '/about' },
    { label: 'Services', link: '/services' },
    { label: 'Contact', link: '/contact' }
  ];

  logout(){
    this.profileService.profile.set('')
  }
}
