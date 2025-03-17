import { Routes } from '@angular/router';
import { HomeComponent } from './home/home/home.component';
import { PageConnexionComponent } from './page-connexion/page-connexion/page-connexion.component';
import { InscriptionComponent } from './inscription/inscription/inscription.component';
import { BiometricComponent } from './biometric/biometric/biometric.component';

export const routes: Routes = [
 {path:'',component:HomeComponent},
 {path:'connexion',component:PageConnexionComponent},
 {path:'inscription',component:InscriptionComponent},
 {path:'reconnaissanceFacial',component:BiometricComponent}
];
