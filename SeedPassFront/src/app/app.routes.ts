import { Routes } from '@angular/router';
import { AutoriteControleComponent } from './autorite-controle/autorite-controle.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { VerificationsComponent } from './verifications/verifications.component';
import { AlertesComponent } from './alertes/alertes.component';
import { RapportsComponent } from './rapports/rapports.component';
import { HomeComponent } from './home/home/home.component';
import { PageConnexionComponent } from './page-connexion/page-connexion/page-connexion.component';
import { InscriptionComponent } from './inscription/inscription/inscription.component';
import { BiometricComponent } from './biometric/biometric/biometric.component';
import { SeedVerificationComponent } from './agricultor/seed-verification/seed-verification.component';
import { ProductorComponent } from './productor/productor/productor.component';
import { SemenceRegistrationComponent } from './registration-semence/semence-registration/semence-registration.component';
import { StockManagementComponent } from './stock-management/stock-management/stock-management.component';
import {ScanSemenceComponent} from './scan-semence/scan-semence/scan-semence.component';

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
export const routes: Routes = [
 {path:'',component:ScanSemenceComponent},
 {path:'connexion',component:PageConnexionComponent},
 {path:'inscription',component:InscriptionComponent},
 {path:'reconnaissanceFacial',component:BiometricComponent},
 {path:'Agricultor',component:SeedVerificationComponent},
 {path:'productor',component:ProductorComponent},
 {path:'register/semence',component:SemenceRegistrationComponent},
 {path:'stock/management',component:StockManagementComponent},
  {path:'scan',component:ScanSemenceComponent}

];
