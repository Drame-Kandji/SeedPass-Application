import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormBuilder, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { SidebarComponent } from "../../sidebar/sidebar/sidebar.component";

@Component({
  selector: 'app-semence-registration',
  imports: [ReactiveFormsModule, SidebarComponent],
  templateUrl: './semence-registration.component.html',
  styleUrl: './semence-registration.component.css'
})
export class SemenceRegistrationComponent {
  seedForm: FormGroup;
  userName = 'Ibrahima Producteur';
  currentDate = 'Samedi 8 mars 2025';

  constructor(private fb: FormBuilder) {
    this.seedForm = this.fb.group({
      variete: ['', Validators.required],
      espece: ['', Validators.required],
      origineGeographique: ['', Validators.required],
      anneeRecolte: ['', Validators.required],
      traitementsAppliques: [''],
      certifications: [''],
      dureeConservation: ['', Validators.required],
      qualiteGerminative: ['', Validators.required],
      parcelleProduction: ['', Validators.required],
      quantiteProduite: ['', Validators.required],
      conditionsCulture: ['']
    });
  }

  ngOnInit(): void {
  }

  onSubmit(): void {
    if (this.seedForm.valid) {
      console.log('Données du formulaire soumises:', this.seedForm.value);
      // Logique pour envoyer les données au service
    } else {
      // Marquer tous les champs comme touchés pour afficher les erreurs
      Object.keys(this.seedForm.controls).forEach(key => {
        const control = this.seedForm.get(key);
        control?.markAsTouched();
      });
    }
  }
}
