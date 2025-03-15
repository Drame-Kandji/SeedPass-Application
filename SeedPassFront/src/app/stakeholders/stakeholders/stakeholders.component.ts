import { NgClass, NgFor } from '@angular/common';
import { Component } from '@angular/core';

@Component({
  selector: 'app-stakeholders',
  imports: [NgClass,NgFor],
  templateUrl: './stakeholders.component.html',
  styleUrl: './stakeholders.component.css'
})
export class StakeholdersComponent {
  stakeholders = [
    {
      title: 'Agriculteurs',
      points: [
        'Garantie de la qualité des semences',
        'Augmentation des rendements',
        'Conseils personnalisés'
      ],
      color: 'green'
    },
    {
      title: 'Producteurs',
      points: [
        'Valorisation des semences de qualité',
        'Lutte contre la contrefaçon',
        'Analyse des données de marché'
      ],
      color: 'blue'
    },
    {
      title: 'Distributeurs',
      points: [
        'Gestion optimisée des stocks',
        'Relation de confiance avec les clients',
        'Accès aux données de marché'
      ],
      color: 'yellow'
    },
    {
      title: 'Autorités',
      points: [
        'Contrôle efficace du marché',
        'Statistiques précises pour les politiques',
        'Développement rural'
      ],
      color: 'purple'
    }
  ];
}
