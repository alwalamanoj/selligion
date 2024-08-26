<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tax;
use App\Models\Product;

class TaxController extends Controller
{
     //Get Add Tax
     public function getAddTax(){
        $title = "Add Tax - Selligion";
        return view('Backend.WebsiteAdmin.Taxes.add',[
            'title' => $title
        ]);
    }

    //Get Edit Tax
    public function getEditTax($id){
        $tax = Tax::findOrFail($id);
        $title = "Edit Tax - Selligion";
        return view('Backend.WebsiteAdmin.Taxes.edit',[
            'title' => $title,
            'tax' => $tax,
        ]);
    }

    //Get All Tax
    public function getAllTax(){
        $title = "All Taxes - Selligion";
        $taxes = Tax::all();
        return view('Backend.WebsiteAdmin.Taxes.all',[
            'title' => $title,
            'taxes' => $taxes
        ]);
    }

    //Add Tax
    public function addTax(Request $request){
        $title = "Add Tax - Selligion";
        $tax = Tax::create([
            'tax_name' => $request->input('tax_name'),
            'tax_percentage' => $request->input('tax_percentage'),
        ]);
        return redirect()->back()->with('success','Tax created Successfully');
    }

    //Update Tax
    public function updateTax($id, Request $request){
        $tax = Tax::findOrFail($id);
        $tax->update([
            'tax_name' => $request->input('tax_name'),
            'tax_percentage' => $request->input('tax_percentage'),
        ]);
        return redirect()->back()->with('success','Tax updated Successfully');
    }

    //Delete Tax
    public function deleteTax($id){
        $productsCheckCount = Product::where('tax_id',$id)->count();
        if($productsCheckCount >= 1){
            return redirect()->back()->with('warning','Tax is associated with 1 or more Products');
        }
        else{
            $tax = Tax::findOrFail($id);
            $tax->delete();
            return redirect()->back()->with('success','Tax deleted Successfully');
        }
    }
}
