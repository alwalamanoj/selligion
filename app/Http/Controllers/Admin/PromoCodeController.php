<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoCode;

class PromoCodeController extends Controller
{
     //Get Add PromoCode
     public function getAddPromoCode(){
        $title = "Add PromoCode - Selligion";
        return view('Backend.WebsiteAdmin.PromoCode.add',[
            'title' => $title
        ]);
    }

    //Get Edit Tax
    public function getEditPromoCode($id){
        $promoCode = PromoCode::findOrFail($id);
        $title = "Edit PromoCode - Selligion";
        return view('Backend.WebsiteAdmin.PromoCode.edit',[
            'title' => $title,
            'promoCode' => $promoCode,
        ]);
    }

    //Get All Tax
    public function getAllPromoCode(){
        $title = "All PromoCode - Selligion";
        $promoCodes = PromoCode::all();
        return view('Backend.WebsiteAdmin.PromoCode.all',[
            'title' => $title,
            'promoCodes' => $promoCodes
        ]);
    }

    //Add Tax
    public function addPromoCode(Request $request){
        $title = "Add PromoCode - Selligion";
        $promocode = PromoCode::create([
            'promocode' => $request->input('promocode'),
            'discount_price' => $request->input('discount_price'),
            'validity' => $request->input('validity'),
            'start_date' => $request->input('start_date'),
        ]);
        return redirect()->back()->with('success','Promo Code created Successfully');
    }

    //Update Tax
    public function updatePromoCode($id, Request $request){
        $promoCode = PromoCode::findOrFail($id);
        $promoCode->update([
            'promocode' => $request->input('promocode'),
            'discount_price' => $request->input('discount_price'),
            'validity' => $request->input('validity'),
            'start_date' => $request->input('start_date'),
        ]);
        return redirect()->back()->with('success','Promo Code updated Successfully');
    }

    //Delete Tax
    public function deletePromoCode($id){
        $ordersCheckCount = 0;
        if($ordersCheckCount >= 1){
            return redirect()->back()->with('warning','Promo Code is associated with 1 or more Orders');
        }
        else{
            $promoCode = PromoCode::findOrFail($id);
            $promoCode->delete();
            return redirect()->back()->with('success','Promo Code deleted Successfully');
        }
    }
}
