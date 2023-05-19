<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//this is the controller for the admincontroller for the admin only

class AdminController extends Controller
{
    

 //the  Method  below control the admin profile logout 
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    //this Method  return view to the admin dashboard 
    public function AdminDashboard(){
        return view('admin.admin_dashboard');

    }// End Method 

    public function AdminLogin(){
        return view('admin.admin_login');
    }//end method ... this is the method for the admin login 

    public function AdminRegister(){
        return view('admin.admin_register');
    }

    //the method below works for the reset password from the admin side 
    public function AdminPasswordReset(){
        return view('admin.admin_forgetpassword');
    }

    public function Admin404(){
        return view('admin.admin_404');
    }//end the error 404 method 

    //this method below is for the Admin blank page 
    public function AdminBlank(){
        return view('admin.admin_blank');
    }
}
