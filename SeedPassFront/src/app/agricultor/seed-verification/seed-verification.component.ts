// seed-verification.component.ts
import { NgClass, NgIf } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';

interface SeedInfo {
  variety: string;
  producer: string;
  productionDate: string;
  certification: string;
  lot: string;
}

interface TraceabilityInfo {
  production: string;
  certification: string;
  distribution: string;
  utilization: string;
}

@Component({
  selector: 'app-seed-verification',
  imports:[NgClass,NgIf],
  templateUrl: './seed-verification.component.html',
  styleUrls: ['./seed-verification.component.css']
})
export class SeedVerificationComponent {
  username: string = 'Ibrahima';
  userRole: string = 'Agriculteur';
  searchQuery: string = '';
  isAuthentic: boolean = true;
  verificationPerformed: boolean = true;

  seedInfo: SeedInfo = {
    variety: 'Maïs hybride ZM253',
    producer: 'SemeAfrica ltd',
    productionDate: '12/2024',
    certification: 'ISO911',
    lot: 'A45878C90'
  };

  traceabilityInfo: TraceabilityInfo = {
    production: '10/2024',
    certification: '11/2024',
    distribution: '12/2024',
    utilization: '../../..'
  };

  constructor() {}

  scanQRCode(): void {
    console.log('Scanning QR Code...');
    // Logique pour scanner un code QR
  }

  searchById(): void {
    console.log('Searching by ID...');
    // Logique pour rechercher par identifiant
  }

  performSearch(): void {
    console.log('Performing search with query:', this.searchQuery);
    // Logique pour effectuer une recherche
    this.searchQuery = '';
  }

  reportProblem(): void {
    console.log('Reporting a problem...');
    // Logique pour signaler un problème
  }

  clearSearch(): void {
    this.searchQuery = '';
  }

  logout(): void {
    console.log('Logging out...');
    // Logique de déconnexion
  }
}
