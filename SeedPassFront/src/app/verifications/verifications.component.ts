import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms'; // Importez FormsModule

@Component({
  selector: 'app-verifications',
  standalone: true,
  imports: [CommonModule, FormsModule], // Ajoutez FormsModule ici
  templateUrl: './verifications.component.html',
  styleUrls: ['./verifications.component.css']
})
export class VerificationsComponent {
  semences = [
    { id: 1, variete: 'Maïs', quantite: 100, statut: 'Certifié' },
    { id: 2, variete: 'Blé', quantite: 200, statut: 'Non certifié' },
    { id: 3, variete: 'Riz', quantite: 150, statut: 'Certifié' },
    { id: 4, variete: 'Soja', quantite: 300, statut: 'Non certifié' }
  ];

  nouvelleSemence = {
    id: 0,
    variete: '',
    quantite: 0,
    statut: 'Certifié'
  };

  onSubmit() {
    // Générer un nouvel ID
    this.nouvelleSemence.id = this.semences.length + 1;

    // Ajouter la nouvelle semence à la liste
    this.semences.push({ ...this.nouvelleSemence });

    // Réinitialiser le formulaire
    this.nouvelleSemence = {
      id: 0,
      variete: '',
      quantite: 0,
      statut: 'Certifié'
    };
  }
}