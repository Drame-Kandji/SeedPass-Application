import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ZXingScannerModule } from '@zxing/ngx-scanner';
import { SeedVerificationComponent } from './seed-verification.component';

@NgModule({
  declarations: [
    SeedVerificationComponent
  ],
  imports: [
    CommonModule,  // Remplace BrowserModule si ce n'est pas le module racine
    ZXingScannerModule
  ],
  exports: [
    SeedVerificationComponent  // Permet d'utiliser ce composant ailleurs
  ]
})
export class SeedVerificationModule { }
