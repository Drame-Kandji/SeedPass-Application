import { NgClass, NgFor, NgIf } from '@angular/common';
import { Component, ElementRef, inject, ViewChild } from '@angular/core';
import { Router } from '@angular/router';


@Component({
  selector: 'app-biometric',
  imports: [NgClass, NgIf],
  templateUrl: './biometric.component.html',
  styleUrl: './biometric.component.css'
})
export class BiometricComponent {
  activeTab: 'fingerprint' | 'facialRecognition' = 'facialRecognition';
  scanningState: 'initial' | 'scanning' | 'success' | 'failed' = 'initial';
  scanProgress: number = 0;
  scanInterval: any;
fingerDetected: any;
scanningInProgress: any;
homepage=inject(Router)
@ViewChild('videoElement') videoElement!: ElementRef;
stream!: MediaStream;

  constructor() { }

  setActiveTab(tab: 'fingerprint' | 'facialRecognition') {
    this.activeTab = tab;
    // Reset scanning state if tab is changed
    this.resetScan();
  }

  startScan() {
    this.scanningState = 'scanning';
    this.scanProgress = 0;
    this.stopCamera();
    // Simulate facial scanning progress
    this.scanInterval = setInterval(() => {
      this.scanProgress += 5;

      if (this.scanProgress >= 100) {
        clearInterval(this.scanInterval);
        this.scanningState = 'success';
      }
    }, 150);
  }

  resetScan() {
    this.scanningState = 'initial';
    this.scanProgress = 0;

    if (this.scanInterval) {
      clearInterval(this.scanInterval);
    }
    this.startCamera()
  }

  continueProcess() {
    this.homepage.navigateByUrl('Agricultor')
  }


    async startCamera() {
      try {
        this.stream = await navigator.mediaDevices.getUserMedia({ video: true });
        this.videoElement.nativeElement.srcObject = this.stream;
      } catch (error) {
        console.error('Erreur d’accès à la caméra :', error);
      }
    }

    stopCamera() {
      if (this.stream) {
        this.stream.getTracks().forEach(track => track.stop());
      }
    }

    ngOnInit() {
      this.startCamera();
    }

    ngOnDestroy() {
      this.stopCamera();
    }
}
