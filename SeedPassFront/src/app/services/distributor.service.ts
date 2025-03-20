import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { UserInterface } from '../interface/user-interface';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class DistributorService {
  http=inject(HttpClient);
  url='http://localhost:8000/api/ressource/distributeurs';
  constructor() { }
   SaveDistributor(distributeurs:UserInterface):Observable<UserInterface>
   {
     return this.http.post<UserInterface>(this.url,distributeurs);
   }
}
