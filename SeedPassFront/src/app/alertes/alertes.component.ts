import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-alertes',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './alertes.component.html',
  styleUrls: ['./alertes.component.css']
})
export class AlertesComponent {
  alertes = [
    { nomProducteur: 'AgriSeed SA', idSemence: 1, varieteSemence: 'Maïs' },
    { nomProducteur: 'Tech Seeds', idSemence: 2, varieteSemence: 'Blé' },
    { nomProducteur: 'SeedFarm', idSemence: 3, varieteSemence: 'Riz' },
    { nomProducteur: 'AgriTech', idSemence: 4, varieteSemence: 'Soja' }
  ];
}
