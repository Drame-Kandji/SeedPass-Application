// seed-verification.component.ts
import {Component, inject, OnInit} from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {VerifiableCredentialService} from '../services/verifiable-credential.service';


@Component({
  selector: 'app-seed-verification',
  standalone:false,
  templateUrl: './seed-verification.component.html',
  styleUrls: ['./seed-verification.component.scss']
})
export class SeedVerificationComponent implements OnInit {
  scannerEnabled = false;
  service= inject(VerifiableCredentialService);
  scanResult: any = null;
  verificationResult: any = null;
  isLoading = false;
  errorMessage: string = '';

  // États possibles de la vérification
  verificationStatus = {
    VALID: 'valid',
    EXPIRED: 'expired',
    INVALID: 'invalid',
    UNKNOWN: 'unknown'
  };

  constructor(private http: HttpClient) { }

  ngOnInit(): void { }

  enableScanner(): void {
    this.scannerEnabled = true;
    this.scanResult = null;
    this.verificationResult = null;
    this.errorMessage = '';
  }

  disableScanner(): void {
    this.scannerEnabled = false;
  }

  // Méthode appelée quand un QR code est scanné
  handleScanSuccess(result: string): void {
    this.scannerEnabled = false;
    this.isLoading = true;

    try {
      this.scanResult = JSON.parse(result);
      this.verifyCredential(this.scanResult);
    } catch (error) {
      this.errorMessage = 'Format de QR code invalide';
      this.isLoading = false;
    }
  }

  // Méthode pour télécharger un fichier QR code
  handleFileUpload(event: any): void {
    const file = event.target.files[0];
    if (file) {
      this.isLoading = true;

      // Utiliser la bibliothèque jsQR pour décoder l'image
      const reader = new FileReader();
      reader.onload = (e) => {
        // Logique de décodage du QR code à partir de l'image
        // (utiliser une bibliothèque comme jsQR)
        // Une fois décodé, appeler this.handleScanSuccess avec le résultat
      };
      reader.readAsDataURL(file);
    }
  }

  // Méthode pour vérifier le credential avec l'API
  verifyCredential(credential: any): void {
    this.service.verifyCredential(credential).subscribe(
      (data)=>{
        console.log(data)
    }
    );
  }

  // Méthode pour déterminer le statut de vérification
  getVerificationStatus(): string {
    if (!this.verificationResult) return this.verificationStatus.UNKNOWN;

    if (!this.verificationResult.isSignatureValid) {
      return this.verificationStatus.INVALID;
    } else if (this.verificationResult.isExpired) {
      return this.verificationStatus.EXPIRED;
    } else if (this.verificationResult.isValid) {
      return this.verificationStatus.VALID;
    } else {
      return this.verificationStatus.UNKNOWN;
    }
  }
}
