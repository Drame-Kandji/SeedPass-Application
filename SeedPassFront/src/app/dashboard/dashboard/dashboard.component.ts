
import { CommonModule, NgClass, NgFor } from '@angular/common';
import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';

@Component({
  selector: 'app-dashboard',
  standalone:true,
  imports: [CommonModule,RouterLink],
  templateUrl: './dashboard.component.html',
  styleUrl: './dashboard.component.css'
})
export class DashboardComponent {

  constructor() { }

  calendarWeeks = [
    ['1', '2', '3', '4', '5', '6', '7'],
    ['8', '9', '10', '11', '12', '13', '14'],
    ['15', '16', '17', '18', '19', '20', '21'],
    ['22', '23', '24', '25', '26', '27', '28']
  ];

  // Données pour les statistiques
  stats = {
    lots: 24,
    varietes: 12580,
    alertes: 7
  };

  // Données pour l'activité récente
  recentActivities = [
    {
      text: 'Lot de maïs hybride BP445 enregistré',
      date: "Aujourd'hui, 9:40",
      status: 'success'
    },
    {
      text: 'Certification référencée pour Angola-BP335',
      date: 'Hier, 16:20',
      status: 'info'
    },
    {
      text: 'Commande de 2500kg par AFRISO confirmée',
      date: '04/03/2025, 13:15',
      status: 'warning'
    }
  ];
}
