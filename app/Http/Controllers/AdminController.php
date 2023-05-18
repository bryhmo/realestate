<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //this is the controller for the admincontroller for the admin only
    public function AdminDashboard(){
        return view('admin.admin_dashboard');

    }//this is the end of the admin contoler method for the admin only 

    public function AdminLogin(){
        return view('admin.admin_login');
    }//end method ... this is the method for the admin login 
}
