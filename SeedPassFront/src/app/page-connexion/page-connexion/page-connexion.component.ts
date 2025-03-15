import { Component } from '@angular/core';
import { LoginComponent } from "../../login/login/login.component";
import { FeaturesComponent } from "../../features/features/features.component";
import { HeaderComponent } from "../../header/header/header.component";

@Component({
  selector: 'app-page-connexion',
  imports: [LoginComponent, FeaturesComponent, HeaderComponent],
  templateUrl: './page-connexion.component.html',
  styleUrl: './page-connexion.component.css'
})
export class PageConnexionComponent {

}
