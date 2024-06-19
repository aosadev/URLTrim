import { Component } from '@angular/core';
import { UrlShortenerService } from '../services/url-shortener.service';

@Component({
  selector: 'app-url-shortener',
  templateUrl: './url-shortener.component.html',
  styleUrls: ['./url-shortener.component.scss']
})
export class UrlShortenerComponent {
  url: string = '';
  shortenedUrl: string | null = null;

  constructor(private urlShortenerService: UrlShortenerService) {}

  shortenUrl() {
    this.urlShortenerService.shortenUrl(this.url).subscribe(response => {
      this.shortenedUrl = response.shortenedUrl;
    });
  }
}
