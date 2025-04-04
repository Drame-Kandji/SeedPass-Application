import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { UserInterface } from '../interface/user-interface';
import { Observable } from 'rxjs';
import { SignInterface } from '../interface/sign-interface';
import { Sucess } from '../interface/sucess';

@Injectable({
  providedIn: 'root'
})
export class ProductorService {
  http=inject(HttpClient)
  url='http://localhost:8000/api/ressource/producteurs'
  url_login='http://127.0.0.1:8000/api/ressource/producteur/login'
  constructor() { }
  SaveProdutor(Productor:UserInterface):Observable<UserInterface>
  {
    return this.http.post<UserInterface>(this.url,Productor);
  }

  login(infos:SignInterface):Observable<Sucess>
     {
      return this.http.post<Sucess>(this.url_login, infos);
     }
}
