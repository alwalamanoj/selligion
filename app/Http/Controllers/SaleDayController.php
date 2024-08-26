<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleDayUser;

class SaleDayController extends Controller
{
    //Get Register Page
    public function getRegisterForSaleDay(){
        $title = 'Sale Day Register - Selligion';
        return view('Frontend.SaleDay.registerForSaleDay',[
            'title' => $title
        ]);
    }

    //Submit Register Sale Day Form Page
    public function registerForSaleDay(Request $request){
        $title = 'Success - Selligion';
        $saleDayUser = SaleDayUser::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'mobile_number'=>$request->mobile_number,
        ]);
        return view('Frontend.SaleDay.thankyou',[
            'saleDayUser'=> $saleDayUser,
            'title'=> $title,
        ]);
    }

    //Get All SaleDay Users for Admin
    public function getAllSaleDayUsers(){
        $title = 'SaleDayUsers - Selligion';
        $saleDayUsers = SaleDayUser::all();
        return view('Backend.WebsiteAdmin.SaleDay.all',[
            'saleDayUsers'=> $saleDayUsers,
            'title'=> $title,
        ]);
    }
}
