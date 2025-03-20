import { Component } from '@angular/core';
import { SidebarComponent } from "../../sidebar/sidebar/sidebar.component";
import { DashboardComponent } from "../../dashboard/dashboard/dashboard.component";

@Component({
  selector: 'app-productor',
  imports: [SidebarComponent, DashboardComponent],
  templateUrl: './productor.component.html',
  styleUrl: './productor.component.css'
})
export class ProductorComponent {
  title = 'seedpass-app';
}
