import { NgClass, NgFor, NgIf } from '@angular/common';
import { Component } from '@angular/core';

@Component({
  selector: 'app-biometric',
  imports: [NgClass,NgIf],
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

  constructor() { }

  setActiveTab(tab: 'fingerprint' | 'facialRecognition') {
    this.activeTab = tab;
    // Reset scanning state if tab is changed
    this.resetScan();
  }

  startScan() {
    this.scanningState = 'scanning';
    this.scanProgress = 0;

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
  }

  continueProcess() {
    // Handle continuing to the next step
    console.log('Continuing to next step after successful facial recognition');
    // Navigation logic would go here
  }
}
