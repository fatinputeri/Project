import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { InfoComponent } from './info/info.component';


@Injectable({
  providedIn: 'root'
})
export class DataService {
  // getHeader(query:string){
  //   let headers = new HttpHeaders();
  }
  
  // constructor(private _http: HttpClient) { }

  // addData(data: user){
  //   let headers = new HttpHeaders().set('Content-Type', 'application/json');
  //   var body = {
  //     Name: data.name, NRIC: data.nric, Address: data.address, Age: data.age, Gender= data.gender,
  //     PhoneNumber: data.phonenumber, Email: data.email, Religon: data.religon, Nationality: data.nationality, MatrialStatus: data.matrialstatus,
  //     PositionHistory: data.positionhistory, LastSalary: data.lastsalary, ExpectedSalary: data.expectedsalary,
  //     LastCompanyName: data.lastcompanyname, BusniessCategory: data.businesscatageory, LastPosition: data.lastposition,
  //     WorkingPeriod: data.workingperiod, ReasonLeaving: data.reasonleaving

  //   }
  //   return this._http.post<user>('backend/personal_information', body {headers});
  // }

