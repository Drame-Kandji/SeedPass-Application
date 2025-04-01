import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import Chart from 'chart.js/auto';

@Component({
  selector: 'app-rapports',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './rapports.component.html',
  styleUrls: ['./rapports.component.css']
})
export class RapportsComponent implements OnInit {
  // Données pour le graphique des certifications par région
  certificationsParRegion = {
    labels: ['Nord', 'Sud', 'Est', 'Ouest', 'Centre'],
    datasets: [{
      label: 'Certifications',
      data: [300, 250, 200, 150, 100],
      backgroundColor: '#4CAF50',
      borderColor: '#4CAF50',
      borderWidth: 1
    }]
  };

  // Données pour les alertes par producteur
  alertesParProducteur = [
    { producteur: 'AgriSeed SA', nombreAlertes: 3 },
    { producteur: 'Tech Seeds', nombreAlertes: 5 },
    { producteur: 'SeedFarm', nombreAlertes: 2 },
    { producteur: 'AgriTech', nombreAlertes: 4 }
  ];

  // Données pour les semences non certifiées
  semencesNonCertifiees = [
    { id: 1, variete: 'Maïs', quantite: 100, producteur: 'AgriSeed SA' },
    { id: 2, variete: 'Blé', quantite: 200, producteur: 'Tech Seeds' },
    { id: 3, variete: 'Riz', quantite: 150, producteur: 'SeedFarm' },
    { id: 4, variete: 'Soja', quantite: 300, producteur: 'AgriTech' }
  ];

  ngOnInit(): void {
    // Graphique des certifications par région
    const ctx = document.getElementById('certificationsChart') as HTMLCanvasElement;
    new Chart(ctx, {
      type: 'bar',
      data: this.certificationsParRegion,
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