<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
    }//END THE LOGOUT METHOD 

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

    //ADMIN PROFILE
    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view' ,compact('profileData'));

    }//END METHOD

//profilestore data method 
public function AdminProfileStore(Request $request){
    $id = Auth::user()->id;
    $data = User::find($id);
    $data->name = $request->name;
    $data->username = $request->username;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address =$request->address;
    $data->role = $request->role;
    $data->status =$request->status;
    //make sure yiu include the photo ,changing of photo profile when writing ypur own code after extracting from github
    //look down to some code snippet for the photo replace and updating below 

   // if ($data->photo)= $request -> photo;
}//this is the end of the profile store method 


//     public function AdminIndex(){
//         return view('admin.index');
//     }
 }
