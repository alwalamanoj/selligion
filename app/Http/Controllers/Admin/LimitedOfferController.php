<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LimitedTimeOffer;
use App\Models\Product;

class LimitedOfferController extends Controller
{
    //Get Add PromoCode
    public function getAddLimitedOffer(){
        $title = "Add Offer - Selligion";
        $products = Product::where('addOn','no')->get();
        return view('Backend.WebsiteAdmin.LimitedTimeOffers.add',[
            'title' => $title,
            'products' => $products,
        ]);
    }

    //Get Edit Limited Offer
    public function getEditLimitedOffer ($id){
        $offer = LimitedTimeOffer::findOrFail($id);
        $products = Product::where('addOn','no')->get();
        $title = "Edit PromoCode - Selligion";
        return view('Backend.WebsiteAdmin.LimitedTimeOffers.edit',[
            'title' => $title,
            'offer' => $offer,
            'products' => $products,
        ]);
    }

    //Get All Limited Offer
    public function getAllLimitedOffer (){
        $title = "All Limited Time Offers - Selligion";
        $offers = LimitedTimeOffer::all();
        return view('Backend.WebsiteAdmin.LimitedTimeOffers.all',[
            'title' => $title,
            'offers' => $offers
        ]);
    }

    //Add Limited Offer
    public function addLimitedOffer(Request $request){
        $title = "Add Limited Time Offer - Selligion";
        $status = $request->is_activated;
        $offer = LimitedTimeOffer::create([
            'offer_title' => $request->offer_title,
            'offer_description' => $request->offer_description,
            'product_id' => $request->product_id,
            'offer_quantity' => $request->offer_quantity,
            'is_activated' => $request->is_activated,
            'offer_price' => $request->offer_price,
            'offer_start_date' => $request->offer_start_date,
            'offer_end_date' => $request->offer_end_date,
        ]);
        if ($status == 1) {
            LimitedTimeOffer::where('is_activated', 1)
                ->where('product_id', $request->product_id)
                ->where('id', '!=', $offer->id)
                ->update(['is_activated' => 0]);
        }
        return redirect()->back()->with('success','Offer created Successfully');
    }

    //Update Limited Offer
    public function updateLimitedOffer ($id, Request $request){
        $offer = LimitedTimeOffer::findOrFail($id);
        $status = $request->is_activated;
        $offer->update([
            'offer_title' => $request->offer_title,
            'offer_description' => $request->offer_description,
            'product_id' => $request->product_id,
            'offer_quantity' => $request->offer_quantity,
            'is_activated' => $status,
            'offer_price' => $request->offer_price,
            'offer_start_date' => $request->offer_start_date,
            'offer_end_date' => $request->offer_end_date,
        ]);
        if ($status == 1) {
            LimitedTimeOffer::where('is_activated', 1)
                ->where('product_id', $request->product_id)
                ->where('id', '!=', $id)
                ->update(['is_activated' => 0]);
        }
        return redirect()->back()->with('success','Offer updated Successfully');
    }

    //Delete Limited Offer
    public function deleteLimitedOffer($id){
        $offer = LimitedTimeOffer::findOrFail($id);
        if($offer->is_activated == 1){
            return redirect()->back()->with('warning','Offer Cannot be Deleted - Deactivate It');
        }
        else{
            $offer->delete();
            return redirect()->back()->with('success','Offer deleted Successfully');
        }
    }
}
