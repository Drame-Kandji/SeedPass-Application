import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { UserInterface } from '../interface/user-interface';
import { Observable } from 'rxjs';
import { SignInterface } from '../interface/sign-interface';
import { Sucess } from '../interface/sucess';

@Injectable({
  providedIn: 'root'
})
export class FamerService {
  http=inject(HttpClient)
  url = 'http://localhost:8000/api/ressource/agriculteurs';
  url_login='http://127.0.0.1:8000/api/ressource/login'
  constructor() {

   }
   SaveFamer(Famer:UserInterface):Observable<UserInterface>
   {
    return this.http.post<UserInterface>(this.url, Famer);
   }

   login(infos:SignInterface):Observable<Sucess>
   {
    return this.http.post<Sucess>(this.url_login, infos);
   }
}
