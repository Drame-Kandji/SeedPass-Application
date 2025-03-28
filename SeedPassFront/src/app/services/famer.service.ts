import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { UserInterface } from '../interface/user-interface';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class FamerService {
  http=inject(HttpClient)
  url = 'http://localhost:8000/api/ressource/agriculteurs';
  //url1='http://127.0.0.1:8000/api/ressource/agriculteurs'
  constructor() {

   }
   SaveFamer(Famer:UserInterface):Observable<UserInterface>
   {
    return this.http.post<UserInterface>(this.url, Famer);
   }
}
