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


//the below  middleware prevent any other users from accesing the Admin Dashboard
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');//admin dashboard route ,protected 
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');//logout route ,protected 
});


//the below middelware prevent any other users from accesssing the agent dashboard
Route::middleware(['auth','role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});//this is the end of the route protected admin route from been accessed by the other users like agent and the users

//the route below is the Admin dashboard login route , bc admin needs to login before been protected 
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

//the route below is the Admin dashboard register route , bc admin needs to login before been protected 
Route::get('/admin/register', [AdminController::class, 'AdminRegister'])->name('admin.register');