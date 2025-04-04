import {Component, inject} from '@angular/core';
import {CommonModule, NgIf} from "@angular/common";
import {ZXingScannerModule} from "@zxing/ngx-scanner";
import {VerifiableCredentialService} from '../../services/verifiable-credential.service';
import {HttpClient} from '@angular/common/http';
import jsQR from 'jsqr';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-scan-semence',
  standalone:true,
    imports: [RouterLink,NgIf,ZXingScannerModule,CommonModule],  // Remplace BrowserModule si ce n'est pas le module racin],
  templateUrl: './scan-semence.component.html',
  styleUrl: './scan-semence.component.css'
})
export class ScanSemenceComponent {
  scannerEnabled = false;
  service= inject(VerifiableCredentialService);
  scanResult: any = null;
  verificationResult: any = null;
  isLoading = false;
  errorMessage: string = '';
  data= {
    "credential": {
      "id": "did:seedpass:5662b2910bf45fd54827b79a8ee69f00",
      "type": [
        "VerifiableCredential",
        "SeedAuthenticationCredential"
      ],
      "proof": {
        "type": "Ed25519Signature2020",
        "created": "2025-03-24T13:13:54+00:00",
        "proofValue": "TOYMM6NSuoslEIlTgkonwY8eZJXi7hmsajeTkZQ4Er4=",
        "proofPurpose": "assertionMethod",
        "verificationMethod": "did:web:seedpass.sn:keys#key-1"
      },
      "issuer": "did:web:seedpass.sn",
      "@context": [
        "https://www.w3.org/2018/credentials/v1",
        "https://seedpass.sn/contexts/seed-context.json",
        "https://w3id.org/security/suites/ed25519-2020/v1"
      ],
      "issuanceDate": "2025-03-24T13:13:54+00:00",
      "expirationDate": "2028-03-24T13:13:54+00:00",
      "credentialSubject": {
        "id": "did:seedpass:lot:LOT-YHTHDMU8",
        "type": "SeedAuthenticationCredential",
        "lotNumber": "LOT-YHTHDMU8",
        "variety": "Arachide Sénégalais",
        "geographicOrigin": "Région de Thiès, Sénégal",
        "yearOfHarvest": 2024,
        "processing": "Séché et trié manuellement",
        "certification": "Label Bio Sénégal",
        "germinationQuality": 98,
        "productionSplot": "Parcelle N°23 - Ferme Diop",
        "quantityProduced": 500,
        "growingConditions": "Cultivé en plein champ avec irrigation goutte-à-goutte",
        "producer": {
          "name": "Saydou Diop",
          "organisation": "SD Prod",
          "identificationNumber": "SD123YH453HI555"
        }
      }
    },
    "qr_code_url": "http://127.0.0.1:8000/storage/qrcodes/seed_LOT-YHTHDMU8.png"
  }

  // États possibles de la vérification
  verificationStatus = {
    VALID: 'valid',
    EXPIRED: 'expired',
    INVALID: 'invalid',
    UNKNOWN: 'unknown'
  };

  constructor(private http: HttpClient) { }

  ngOnInit(): void {
    this.verifyCredential(this.data)
  }

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
    console.log(result)
    this.scannerEnabled = false;
    this.isLoading = true;

    try {
      this.scanResult = JSON.parse(result);
      console.log(this.scanResult)
      this.verifyCredential(this.scanResult);
    } catch (error) {
      this.errorMessage = 'Format de QR code invalide';
      this.isLoading = false;
      console.log(this.scanResult);
    }
  }

  // Méthode pour télécharger un fichier QR code
  // handleFileUpload(event: any): void {
  //   const file = event.target.files[0];
  //   if (file) {
  //     this.isLoading = true;
  //     // Utiliser la bibliothèque jsQR pour décoder l'image
  //     const reader = new FileReader();
  //     reader.onload = (e) => {
  //       // Logique de décodage du QR code à partir de l'image
  //       // (utiliser une bibliothèque comme jsQR)
  //       // Une fois décodé, appeler this.handleScanSuccess avec le résultat
  //     };
  //     reader.readAsDataURL(file);
  //   }
  // }

  // Méthode pour télécharger un fichier QR code
  handleFileUpload(event: any): void {
    const file = event.target.files[0];
    if (file)
    {
      this.isLoading = true;

      const reader = new FileReader();
      reader.onload = (e) => {
        const imageUrl = e.target?.result as string;
        

        // Créer une image à partir des données
        const image = new Image();
        image.onload = () => {
          // Créer un canvas pour traiter l'image
          const canvas = document.createElement('canvas');
          const context = canvas.getContext('2d');
          
          

          // Définir la taille du canvas
          canvas.width = image.width;
          canvas.height = image.height;

          // Dessiner l'image sur le canvas
          context?.drawImage(image, 0, 0);

          // Obtenir les données de l'image
          const imageData = context?.getImageData(0, 0, canvas.width, canvas.height);

          // Utiliser jsQR pour décoder le QR code
          if (imageData) {
            const code = jsQR(imageData.data, imageData.width, imageData.height, {
              inversionAttempts: "dontInvert",
            });
            console.log(imageData);

            if (code) {
              // QR code trouvé, traiter le résultat
              this.handleScanSuccess(code.data);
            } else {
              // Aucun QR code trouvé
              this.isLoading = false;
              this.errorMessage = "Aucun QR code n'a été détecté dans l'image";
            }
          }
        };

        // Charger l'image
        image.src = imageUrl;
      };

      reader.onerror = () => {
        this.isLoading = false;
        this.errorMessage = "Erreur lors de la lecture du fichier";
      };

      // Lire le fichier comme une URL de données
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
