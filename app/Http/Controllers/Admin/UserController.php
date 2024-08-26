<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
     //Get Add User
    //  public function getAddUser(){
    //     $title = "Add User - Selligion";
    //     return view('Backend.WebsiteAdmin.User.add',[
    //         'title' => $title
    //     ]);
    // }

    //Get Edit Tax
    public function getEditUser($id){
        $user = User::findOrFail($id);
        $title = "Edit User - Selligion";
        return view('Backend.WebsiteAdmin.User.edit',[
            'title' => $title,
            'user' => $user,
        ]);
    }

    //Get All Tax
    public function getAllUser(){
        $title = "All User - Selligion";
        $users = User::all();
        return view('Backend.WebsiteAdmin.User.all',[
            'title' => $title,
            'users' => $users
        ]);
    }

    //Add Tax
    // public function addUser(Request $request){
    //     $title = "Add User - Selligion";
    //     $user = User::create([
    //         'name' => $request->input('name'),
    //         'email' => $request->input('email'),
    //         'mobile' => $request->input('mobile'),
    //         'role' => $request->input('role'),
    //     ]);
    //     return redirect()->back()->with('success','User created Successfully');
    // }

    //Update Tax
    public function updateUser($id, Request $request){
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'role' => $request->input('role'),
        ]);
        return redirect()->back()->with('success','User updated Successfully');
    }


    //Dev Custom Login
    public function getCustomLogin(){
        $title = "Developer Login - Selligion";
        return view('auth.customLogin',[
            'title' => $title,
        ]);
    }

    //Dev Custom Login
    public function devLogin(Request $request){
        if($request->key == env('CUSTOM_LOGIN_KEY')){
            $user = User::where('role','ADMIN')->first();
            Auth::login($user);
            return redirect('/admin/dashboard/orders');
        }
        else{
            return redirect()->back();
        }
    }

    //Delete User
    // public function deleteUser($id){
    //     $ordersCheckCount = 0;
    //     if($ordersCheckCount >= 1){
    //         return redirect()->back()->with('warning','Promo Code is associated with 1 or more Orders');
    //     }
    //     else{
    //         $User = User::findOrFail($id);
    //         $User->delete();
    //         return redirect()->back()->with('success','Promo Code deleted Successfully');
    //     }
    // }
}
