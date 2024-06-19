import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UrlShortenerService {
  private apiUrl = 'http://localhost:8000';

  constructor(private http: HttpClient) {}

  shortenUrl(originalUrl: string): Observable<any> {
    return this.http.post<any>(`${this.apiUrl}/shorten`, { url: originalUrl });
  }
}

