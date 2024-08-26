<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderFormat;

class OrderFormatController extends Controller
{
    //Get Format
    public function getOrderFormat(){
        $title = 'OrderID Format - Selligion';
        $orderIdFormat = OrderFormat::first();
        return view('Backend.WebsiteAdmin.OrderFormat.edit',[
            'orderIdFormat' => $orderIdFormat,
            'title' => $title
        ]);
    }

    //Update Format
    public function updateOrderFormat($id, Request $request){
        $orderIdFormat = OrderFormat::findOrFail($id);
        $orderIdFormat->update([
            'custom_format' => $request->input('custom_format'),
        ]);
        return redirect()->back()->with('success','Order ID Format updated Successfully');
    }
}
