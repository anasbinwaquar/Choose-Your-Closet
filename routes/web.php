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
Route::get('/', [App\Http\Controllers\CustomerInfoController::class, 'CustomerSignUpView']);


Route::get('/admin_login', [App\Http\Controllers\userController::class, 'LoginAdminView']);	


Route::post('/LoginAdminCheck', [App\Http\Controllers\userController::class, 'LoginAdmin']);


Route::get('/SellerSignUp', [App\Http\Controllers\userController::class, 'SellerSignUpView']);


Route::get('/Seller_Authentication', [App\Http\Controllers\userController::class, 'Seller_Authentication']);


Route::get('/SellerLogin', [App\Http\Controllers\userController::class, 'SellerLoginView']);


Route::get('/CustomerSignUp', [App\Http\Controllers\CustomerInfoController::class, 'CustomerSignUpView']);


Route::post('/Seller_registered', [App\Http\Controllers\userController::class, 'SellerSignUp']);


Route::post('/setapproval', [App\Http\Controllers\userController::class, 'setapproval']);


Route::post('/SellerLoggedIn', [App\Http\Controllers\userController::class, 'SellerLogin']);


Route::post('/Customer_registered', [App\Http\Controllers\CustomerInfoController::class, 'CustomerSignUp']);



Route::get('/CustomerLogin',[App\Http\Controllers\CustomerInfoController::class,'CustomerLoginView']);



Route::post('/LoggedIn',[App\Http\Controllers\CustomerInfoController::class,'CustomerLogin']);


Route::get('/UserProfile',[App\Http\Controllers\CustomerInfoController::class,'ProfileView']);


Route::get('/UserLogout',[App\Http\Controllers\CustomerInfoController::class,'UserLogout']);

Route::get('/ListProduct',[App\Http\Controllers\ProductController::class,'index']);
Route::get('/CreateProduct',[App\Http\Controllers\ProductController::class,'create']);
