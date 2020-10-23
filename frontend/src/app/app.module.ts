import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavBarComponent } from './nav-bar/nav-bar.component';
import { InfoComponent } from './info/info.component';
import { LoginComponent } from './login/login.component';
import { DataService } from './data.service';


@NgModule({
  declarations: [
    AppComponent,
    NavBarComponent,
    InfoComponent,
    LoginComponent,
  
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [ DataService],
  bootstrap: [AppComponent]
})
export class AppModule { }
