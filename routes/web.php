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

Route::get('/SellerLogin', [App\Http\Controllers\userController::class, 'SellerLoginView'])->name('SellerLogin');

Route::get('/CustomerSignUp', [App\Http\Controllers\CustomerInfoController::class, 'CustomerSignUpView']);

Route::post('/Seller_registered', [App\Http\Controllers\userController::class, 'SellerSignUp']);

Route::get('/setapproval/{id}', [App\Http\Controllers\userController::class, 'setapproval']);

Route::get('/declineapproval/{id}', [App\Http\Controllers\userController::class, 'declineapproval']);

Route::post('/SellerLoggedIn', [App\Http\Controllers\userController::class, 'SellerLogin']);

Route::post('/Customer_registered', [App\Http\Controllers\CustomerInfoController::class, 'CustomerSignUp']);

Route::get('/CustomerLogin',[App\Http\Controllers\CustomerInfoController::class,'CustomerLoginView']);

Route::post('/LoggedIn',[App\Http\Controllers\CustomerInfoController::class,'CustomerLogin']);

Route::get('/UserProfile',[App\Http\Controllers\CustomerInfoController::class,'ProfileView']);

Route::get('/SellerProfile',[App\Http\Controllers\userController::class,'SellerProfileView'])->name('SellerProfile');

Route::get('/UserLogout',[App\Http\Controllers\CustomerInfoController::class,'UserLogout']);

Route::get('/SellerLogout',[App\Http\Controllers\userController::class,'SellerLogout']);

// Product

Route::get('/ListProduct',[App\Http\Controllers\ProductController::class,'index']);

Route::post('/CreateProduct',[App\Http\Controllers\ProductController::class,'store'])->name('CreateProduct');

Route::get('/Product_approval',[App\Http\Controllers\ProductController::class,'approval']);

Route::get('/product_list',[App\Http\Controllers\ProductController::class,'show']);

Route::get('/set_product_approval/{product_id}', [App\Http\Controllers\ProductController::class, 'setapproval'])->name("set_product_approval");

Route::get('/decline_product_approval/{product_id}', [App\Http\Controllers\ProductController::class, 'declineapproval'])->name("decline_product_approval");