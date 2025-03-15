import { Routes } from '@angular/router';
import { HomeComponent } from './home/home/home.component';
import { PageConnexionComponent } from './page-connexion/page-connexion/page-connexion.component';

export const routes: Routes = [
 {path:'',component:HomeComponent},
 {path:'connexion',component:PageConnexionComponent}
];
