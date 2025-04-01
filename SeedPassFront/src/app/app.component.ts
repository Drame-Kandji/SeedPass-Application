import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterOutlet } from '@angular/router';
import { HeaderComponent } from "./header/header/header.component";
import { LoginComponent } from "./login/login/login.component";
import { FeaturesComponent } from "./features/features/features.component";
import { HomeComponent } from "./home/home/home.component";
import { FooterComponent } from "./footer/footer/footer.component";

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule, RouterOutlet], // Supprimez AutoriteControleComponent
  imports: [RouterOutlet, HeaderComponent, LoginComponent, FeaturesComponent, HomeComponent, FooterComponent],
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'seedpass-frontend';
}
