import { NgClass, NgFor } from '@angular/common';
import { Component } from '@angular/core';

@Component({
  selector: 'app-how-it-works',
  imports: [NgClass,NgFor],
  templateUrl: './how-it-works.component.html',
  styleUrl: './how-it-works.component.css'
})
export class HowItWorksComponent {
  steps = [
    {
      number: 1,
      title: 'Enregistrement',
      description: 'Les producteurs enregistrent leurs semences',
      color: 'green'
    },
    {
      number: 2,
      title: 'Vérification',
      description: 'Authentification des semences certifiées',
      color: 'blue'
    },
    {
      number: 3,
      title: 'Traçabilité',
      description: 'Suivi complet de l\'origine des semences',
      color: 'yellow'
    }
  ];
}
