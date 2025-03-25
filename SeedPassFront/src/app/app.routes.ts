import { Routes } from '@angular/router';
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
