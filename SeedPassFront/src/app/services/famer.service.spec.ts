import { TestBed } from '@angular/core/testing';

import { FamerService } from './famer.service';

describe('FamerService', () => {
  let service: FamerService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(FamerService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
