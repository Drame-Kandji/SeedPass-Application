import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-autorite-controle',
  standalone: true,
  imports: [CommonModule, RouterModule], // Importez RouterModule
  templateUrl: './autorite-controle.component.html',
  styleUrls: ['./autorite-controle.component.css']
})
export class AutoriteControleComponent {}