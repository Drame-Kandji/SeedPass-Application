import { Component } from '@angular/core';
import { SeedLot } from '../../interface/lot-interface';
import { SidebarComponent } from "../../sidebar/sidebar/sidebar.component";
import { NgClass, NgFor, NgIf } from '@angular/common';

@Component({
  selector: 'app-stock-management',
  imports: [SidebarComponent,NgClass,NgFor],
  templateUrl: './stock-management.component.html',
  styleUrl: './stock-management.component.css'
})
export class StockManagementComponent {
  userName = 'Ibrahima Producteur';
  currentDate = 'Samedi 8 mars 2025';

  filterOptions = {
    variete: '',
    date: '',
    statut: ''
  };

  seedLots: SeedLot[] = [
    { reference: 'LOT-2024-001', variete: 'MAÏS ZM223', quantite: '5000 kg', statut: 'Disponible' },
    { reference: 'LOT-2024-001', variete: 'MAÏS ZM223', quantite: '5000 kg', statut: 'Disponible' },
    { reference: 'LOT-2024-001', variete: 'MAÏS ZM223', quantite: '5000 kg', statut: 'Disponible' },
    { reference: 'LOT-2024-001', variete: 'MAÏS ZM223', quantite: '5000 kg', statut: 'Stock bas' },
    { reference: 'LOT-2024-001', variete: 'MAÏS ZM223', quantite: '5000 kg', statut: 'Épuisé' },
    { reference: 'LOT-2024-001', variete: 'MAÏS ZM223', quantite: '5000 kg', statut: 'Disponible' },
    { reference: 'LOT-2024-001', variete: 'MAÏS ZM223', quantite: '5000 kg', statut: 'Disponible' }
  ];

  constructor() { }

  ngOnInit(): void {
  }

  getStatusClass(status: string): string {
    switch(status) {
      case 'Disponible':
        return 'bg-green-200 text-green-800';
      case 'Stock bas':
        return 'bg-yellow-200 text-yellow-800';
      case 'Épuisé':
        return 'bg-red-200 text-red-800';
      default:
        return 'bg-gray-200 text-gray-800';
    }
  }

  viewDetails(lot: SeedLot): void {
    console.log('Voir détails:', lot);
  }

  editLot(lot: SeedLot): void {
    console.log('Modifier lot:', lot);
  }

  deleteLot(lot: SeedLot): void {
    console.log('Supprimer lot:', lot);
    // Logique pour supprimer ou marquer comme supprimé
  }

  applyFilters(): void {
    console.log('Filtres appliqués:', this.filterOptions);
    // Logique pour filtrer les lots selon les critères
  }

}
