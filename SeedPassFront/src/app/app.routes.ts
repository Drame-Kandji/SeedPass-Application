import { Routes } from '@angular/router';
import { AutoriteControleComponent } from './autorite-controle/autorite-controle.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { VerificationsComponent } from './verifications/verifications.component';
import { AlertesComponent } from './alertes/alertes.component';
import { RapportsComponent } from './rapports/rapports.component';

export const routes: Routes = [
  {
    path: '',
    component: AutoriteControleComponent,
    children: [
      { path: 'dashboard', component: DashboardComponent },
      { path: 'rapports', component: RapportsComponent },
      { path: 'verifications', component: VerificationsComponent },
      { path: 'alertes', component: AlertesComponent }, // Ajoutez cette route
      { path: '', redirectTo: '/dashboard', pathMatch: 'full' }, // Redirection par défaut
    ],
  },
];