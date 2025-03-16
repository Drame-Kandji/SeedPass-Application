import { NgClass, NgFor } from '@angular/common';
import { Component } from '@angular/core';

@Component({
  selector: 'app-stats',
  imports: [NgClass,NgFor],
  templateUrl: './stats.component.html',
  styleUrl: './stats.component.css'
})
export class StatsComponent {
    stats = [
      {
        value: '60%',
        label: 'des agriculteurs utilisent des semences non certifiées',
        color: 'red'
      },
      {
        value: '100%',
        label: 'traçabilité de l\'origine à la distribution',
        color: 'green'
      },
      {
        value: '+40%',
        label: 'd\'augmentation potentielle des rendements agricoles',
        color: 'blue'
      }
    ];
}
