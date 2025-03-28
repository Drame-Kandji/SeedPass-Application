import { TestBed } from '@angular/core/testing';

import { VerifiableCredentialService } from './verifiable-credential.service';

describe('VerifiableCredentialService', () => {
  let service: VerifiableCredentialService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(VerifiableCredentialService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
