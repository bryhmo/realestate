<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//ADMIN GROUP MIDDLEWARE

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard'); 
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    
});

//END ADMIN GROUP MIDDLEWARE


//AGENT GROUP MIDDLEWARE
Route::middleware(['auth','role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});
//END AGENT MIDDLEWARE


//the route below is the Admin dashboard login route , bc admin needs to login before been protected 
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

//the route below is the Admin dashboard register route , bc admin needs to login before been protected 
Route::get('/admin/register', [AdminController::class, 'AdminRegister'])->name('admin.register');

//the route below works for the forgetpassword module
Route::get('/admin/forgetpassword', [AdminController::class, 'AdminPasswordReset'])->name('admin.forgetpassword');


//the  route below work fon the 404 error module of the admin dashboard
Route::get('/admin/404',[AdminController::class,'Admin404'])->name('admin.404');

//the route bbelow work fon the 404 error module of the admin dashboard
Route::get('/admin/blank',[AdminController::class,'AdminBlank'])->name('admin.blank');

//start index
Route::get('/admin/index',[AdminController::class,'AdminIndex'])->name('admin.index');