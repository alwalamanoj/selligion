<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Add Product
    public function addProduct(){
        $title = "Add Product - Selligion";
        return view('Backend.WebsiteAdmin.Product.add',[
            'title' => $title
        ]);
    }
}
