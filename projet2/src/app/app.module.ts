import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AboutComponent } from './site/about/about.component' ;
import { HomeComponent } from './site/home/home.component';
import { FilmComponent } from './site/film/film.component';
import { NavmenuComponent } from './site/shared/navmenu/navmenu.component';
import { FooterComponent } from './site/shared/footer/footer.component' ;

@NgModule({
  declarations: [
    AppComponent,
    AboutComponent,
    HomeComponent,
    FilmComponent ,
    NavmenuComponent,
    FooterComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
