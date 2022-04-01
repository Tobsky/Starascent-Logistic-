<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffListController;
use App\Http\Controllers\ParcelListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



// ***********  Add Staff
Route::get('/new_staff', function () {
    return view('new_staff');
});

Route::post('new_staff', [StaffListController::class,'addStaff']);

// ***********  list Staff
Route::get('/staff_list', function () {
    return view('staff_list');
});
Route::get('staff_list', [StaffListController::class,'listStaff']);

//************  Delete Staff 
Route::get('delete_staff/{id}', [StaffListController::class,'deleteStaff']);

//************  Edit Staff 
Route::get('edit_staff/{id}', [StaffListController::class,'editStaff']);

Route::post('edit_staff', [StaffListController::class,'updateStaff']);



// Parcel

Route::get('parcel_list', function () {
    return view('parcel_list');
});
Route::get('parcel_list', [ParcelListController::class,'show']);

Route::get('parcel_list/{stats}', [ParcelListController::class,'parcelStatus'])->where('stats', '[0-9]+');

//******** Update Parcel Status
Route::post('parcel_list', [ParcelListController::class,'updateStatus']);

Route::get('/new_parcel', function () {
    return view('new_parcel');
});  
Route::post('new_parcel', [ParcelListController::class,'addParcel']);

//************  Delete Parcel 
Route::get('delete_parcel/{id}', [ParcelListController::class,'deleteParcel'])->where('id', '[0-9]+');

//************  Edit Parcel 
Route::get('edit_parcel/{id}', [ParcelListController::class,'editParcel'])->where('id', '[0-9]+');

Route::post('edit_parcel', [ParcelListController::class,'updateParcel']);



// Track parcel

Route::get('/track', function () {
    return view('track');
});

Route::get('/track_parcel', function () {
    return view('track_parcel');
});

Route::get('/track_parcel/route', [ParcelListController::class, 'trackParcel']);


// Report

Route::get('/report', function () {
    return view('report');
});


// Dashboard

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('dashboard', [DashboardController::class,'total_branches']);

//Route::get('dashboard', [DashboardController::class,'total_parcels']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest'])->group(function(){
        Route::view('/login','login')->name('login');
        Route::view('/register','register')->name('register');
        Route::post('/registerUser', [UserController::class,'registerUser'])->name('registerUser');
    });

    Route::middleware(['auth'])->group(function(){
        Route::view('/home','home')->name('home');
    });
}); */