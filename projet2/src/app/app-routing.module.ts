import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutComponent } from './site/about/about.component' ;
import { HomeComponent } from './site/home/home.component';
import { FilmComponent } from './site/film/film.component';


const routes: Routes = [
  { path: '', component: HomeComponent } ,
  { path: 'home', component: HomeComponent } ,
  { path: 'about', component: AboutComponent } ,
  { path: 'film', component: FilmComponent } ,
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
