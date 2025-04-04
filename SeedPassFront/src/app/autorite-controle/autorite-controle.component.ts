import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterLink, RouterModule, RouterOutlet } from '@angular/router';
//import { DashboardComponent } from "../dashboard/dashboard/dashboard.component";
import { DashboardComponentControle } from "../dasbordAutorite/dashboard/dashboard.component";

@Component({
  selector: 'app-autorite-controle',
  standalone: true,
  imports: [CommonModule, RouterLink,DashboardComponentControle], // Importez RouterModule
  templateUrl: './autorite-controle.component.html',
  styleUrls: ['./autorite-controle.component.css']
})
export class AutoriteControleComponent {}
