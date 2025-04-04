import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { HeaderComponent } from "./header/header/header.component";
import { LoginComponent } from "./login/login/login.component";
import { FeaturesComponent } from "./features/features/features.component";
import { HomeComponent } from "./home/home/home.component";
import { FooterComponent } from "./footer/footer/footer.component";

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, HeaderComponent ,FooterComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'SeedPassFront';
}
