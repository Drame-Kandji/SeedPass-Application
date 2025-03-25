// verifiable-credential.service.ts
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class VerifiableCredentialService {
  private apiUrl = 'http://localhost:8000';

  constructor(private http: HttpClient) { }

  /**
   * Génère un verifiable credential pour une semence
   */
  generateCredential(seedId: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/api/vc/generate/${seedId}`);
  }

  /**
   * Vérifie un credential
   */
  verifyCredential(credential: any): Observable<any> {
    return this.http.post(`${this.apiUrl}/api/vc/verify`, { credential });
  }

  /**
   * Génère un QR code pour un lot existant
   * (à utiliser dans l'interface d'administration)
   */
  generateQrCodeForSeed(seedId: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/api/vc/generate/${seedId}`);
  }

  /**
   * Télécharger l'image QR code
   */
  downloadQrCode(url: string, filename: string): void {
    this.http.get(url, { responseType: 'blob' })
      .subscribe((blob: Blob) => {
        const link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = filename;
        link.click();
      });
  }
}
