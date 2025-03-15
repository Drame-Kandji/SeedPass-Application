import { NgFor } from '@angular/common';
import { Component } from '@angular/core';
import { routes } from '../../app.routes';
import { RouterLink, RouterLinkActive} from '@angular/router';

@Component({
  selector: 'app-header',
  imports:[NgFor,RouterLink,RouterLinkActive],
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent {
  title = 'SeedPass';
  subtitle = 'La traçabilité au service de l\'agriculture africaine';
  menuItems = [
    { label: 'Accueil', link: '/' },
    { label: 'À propos', link: '/about' },
    { label: 'Services', link: '/services' },
    { label: 'Contact', link: '/contact' }
  ];
}
