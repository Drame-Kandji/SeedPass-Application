import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterLink, RouterModule, RouterOutlet } from '@angular/router';
import Chart from 'chart.js/auto';

@Component({
  selector: 'app-dashboardcontrole',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponentControle implements OnInit {
  // Ajoutez la propriété quantite à chaque objet semence
  semences = [
    { id: 'SB-2598', producteur: 'AgriSeed SA', date: '08/03/2025', statut: 'Validé', quantite: 100 },
    { id: 'MZ-7823', producteur: 'Tech Seeds', date: '07/03/2025', statut: 'En attente', quantite: 200 },
    { id: 'RZ-1234', producteur: 'SeedFarm', date: '06/03/2025', statut: 'Validé', quantite: 150 },
    { id: 'BL-4567', producteur: 'AgriTech', date: '05/03/2025', statut: 'Rejeté', quantite: 300 }
  ];

  actions = [
    { description: 'Semences suspectes détectées - Région Sud', details: '3 lots identifiés avec des caractéristiques non conformes, inspection requise.', complete: false },
    { description: 'Demandes de certification en attente (4)', details: 'Nouvelles demandes de certification reçues nécessitant une validation.', complete: true }
  ];

  ngOnInit(): void {
    const ctx = document.getElementById('regionChart') as HTMLCanvasElement;
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Nord', 'Sud', 'Est', 'Ouest', 'Centre'],
        datasets: [{
          label: 'Certifications par région',
          data: [300, 250, 200, 150, 100], // Données du graphique
          backgroundColor: '#4CAF50', // Couleur verte pour les barres
          borderColor: '#4CAF50',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }
}
