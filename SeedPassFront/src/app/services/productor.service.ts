import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { UserInterface } from '../interface/user-interface';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProductorService {
  http=inject(HttpClient)
  url='http://localhost:8000/api/ressource/producteurs'
  constructor() { }
  SaveProdutor(Productor:UserInterface):Observable<UserInterface>
  {
    return this.http.post<UserInterface>(this.url,Productor);
  }
}
