<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCombination;
use App\Models\PromoCode;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendContactUsEmail;
use App\Jobs\SendCareersEmail;
class PageController extends Controller
{
     //Home Page
    public function index(){
        $title = "Home - Selligion";
        return view('Frontend.Home.home',[
            'title' => $title
        ]);
    }

    //Product Page
    public function productPage($slug){
        $title = "Praho 2 - Selligion";
        $product = Product::with('images')->where('slug',$slug)->first();
        $combinations = ProductCombination::with('products')->where('status','publish')->get();
        return view('Frontend.Product.product',[
            'title' => $title,
            'product' => $product,
            'combinations' => $combinations,
        ]);
    }

    //PrivacyPlolicy Page
    public function privacyPolicy(){
        $title = "Privacy Policy - Selligion";
        return view('Frontend.Static.privacyPolicy',[
            'title' => $title
        ]);
    }

    //PrivacyPlolicy Page
    public function termsOfService(){
        $title = "Terms Of Service - Selligion";
        return view('Frontend.Static.termsOfService',[
            'title' => $title
        ]);
    }

    //About Us Page
    public function aboutUs(){
        $title = "About Us - Selligion";
        return view('Frontend.Static.aboutUs',[
            'title' => $title
        ]);
    }

    //Contact Us Page
    public function contactUs(){
        $title = "Contact Us - Selligion";
        return view('Frontend.Static.contactUs',[
            'title' => $title
        ]);
    }

    //Careers Page
    public function careers(){
        $title = "Careers - Selligion";
        return view('Frontend.Static.careers',[
            'title' => $title
        ]);
    }

    //Mitra Page
    public function mitra(){
        $title = "Mitra - Selligion";
        return view('Frontend.Static.mitra',[
            'title' => $title
        ]);
    }


    //Send Contact Us Mail
    public function sendContactUsMail(Request $request){
        $title = "Thank you - Selligion";
        $name = $request->input('name');
        $email = $request->input('email');
        $messageBody = $request->input('message');
        $phoneNumber = $request->input('phone_number');

        $recipientEmail = 'muralirbmk1@gmail.com';
        dispatch(new SendContactUsEmail($name, $email, $messageBody, $phoneNumber));

        return view('Frontend.Static.thankyou', [
            'title' => $title,
            'name' => $name
        ]);
    }
    //Send Career Mail
    public function sendCareersMail(Request $request){
        $title = "Thank you - Selligion";
        $name = $request->input('name');
        $email = $request->input('email');
        $messageBody = $request->input('message');
        dispatch(new SendCareersEmail($name, $email, $messageBody));

        return view('Frontend.Static.thankyou', [
            'title' => $title,
            'name' => $name
        ]);
    }



}
