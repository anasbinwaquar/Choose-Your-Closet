<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/',[App\Http\Controllers\userController::class,'default']);
Route::get('/',[App\Http\Controllers\userController::class,'sign_up']);


Route::get('/admin_login', [App\Http\Controllers\userController::class, 'LoginAdminView']);	


Route::post('/LoginAdminCheck', [App\Http\Controllers\userController::class, 'LoginAdmin']);


Route::get('/SellerSignUp', [App\Http\Controllers\userController::class, 'SellerSignUpView']);


Route::post('/Seller_registered', [App\Http\Controllers\userController::class, 'SellerSignUp']);


Route::post('/Customer_registered', [App\Http\Controllers\userController::class, 'CustomerSignUp']);



Route::get('/login',[App\Http\Controllers\userController::class,'login']);
Route::post('/loging_in/',[App\Http\Controllers\userController::class,'loging']);
Route::get('/profile',[App\Http\Controllers\userController::class,'profile']);
Route::get('/logout',[App\Http\Controllers\userController::class,'logout']);
