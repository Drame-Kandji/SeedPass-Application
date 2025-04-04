import { Component } from '@angular/core';
import { HeaderComponent } from "../../header/header/header.component";
import { HeroSectionComponent } from "../../hero-section/hero-section/hero-section.component";
import { StatsComponent } from "../../stats/stats/stats.component";
import { HowItWorksComponent } from "../../how-it-works/how-it-works/how-it-works.component";
import { StakeholdersComponent } from "../../stakeholders/stakeholders/stakeholders.component";
import { CallToActionComponent } from "../../call-to-action/call-to-action/call-to-action.component";
import { FooterComponent } from "../../footer/footer/footer.component";

@Component({
  selector: 'app-home',
  imports: [HeaderComponent, HeroSectionComponent, StatsComponent, HowItWorksComponent, StakeholdersComponent, CallToActionComponent, FooterComponent],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent {

}
