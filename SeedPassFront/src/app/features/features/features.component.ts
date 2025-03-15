import { CommonModule, NgClass, NgFor } from '@angular/common';
import { Component } from '@angular/core';

@Component({
  selector: 'app-features',
  imports: [NgClass,NgFor],
  templateUrl: './features.component.html',
  styleUrl: './features.component.css'
})
export class FeaturesComponent {

  features = [
    {
      icon: 'check',
      color: 'green',
      title: 'Garantie d\'authenticité des semences',
      description: 'Vérifiez la provenance et la qualité de chaque lot'
    },
    {
      icon: 'arrows-h',
      color: 'blue',
      title: 'Traçabilité complète de la chaîne',
      description: 'Suivez votre semence de sa production à son utilisation'
    },
    {
      icon: 'arrow-up',
      color: 'yellow',
      title: 'Amélioration des rendements',
      description: 'Utilisez des semences vérifiées pour de meilleurs résultats'
    },
    {
      icon: 'recycle',
      color: 'red',
      title: 'Un réseau agricole interconnecté',
      description: 'Tous les acteurs de la chaîne de valeur sur une plateforme'
    }
  ];
}
