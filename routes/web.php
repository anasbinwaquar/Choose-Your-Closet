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

//Admin

Route::get('/admin_login', [App\Http\Controllers\AdminController::class, 'LoginAdminView']);

Route::get('/AdminLogin365625', [App\Http\Controllers\AdminController::class, 'LoginAdminView']);	

Route::post('/LoginAdminCheck', [App\Http\Controllers\AdminController::class, 'LoginAdmin']);

Route::get('/LoginAdminCheck', [App\Http\Controllers\AdminController::class, 'Portal']);

Route::get('/custom_order', [App\Http\Controllers\AdminController::class, 'custom_order']);


Route::get('/image/{{url}}', [App\Http\Controllers\AdminController::class, 'image'])->name('show_image');

Route::get('/image/{url}', [App\Http\Controllers\AdminController::class, 'image']);


//Seller

Route::get('/SellerSignUp', [App\Http\Controllers\SellerController::class, 'SellerSignUpView']);

Route::get('/Seller_Authentication', [App\Http\Controllers\SellerController::class, 'Seller_Authentication']);

Route::get('/ViewProducts',[App\Http\Controllers\SellerController::class,'view_products']);

Route::get('/SellerLogin', [App\Http\Controllers\SellerController::class, 'SellerLoginView'])->name('SellerLogin');

Route::post('/Seller_registered', [App\Http\Controllers\SellerController::class, 'SellerSignUp']);

Route::get('/setapproval/{id}', [App\Http\Controllers\SellerController::class, 'setapproval']);

Route::get('/declineapproval/{id}', [App\Http\Controllers\SellerController::class, 'declineapproval']);

Route::post('/SellerLoggedIn', [App\Http\Controllers\SellerController::class, 'SellerLogin']);

Route::get('/SellerProfile',[App\Http\Controllers\SellerController::class,'SellerProfileView'])->name('SellerProfile');

Route::get('/SellerLogout',[App\Http\Controllers\SellerController::class,'SellerLogout']);

Route::get('/ViewOrders',[App\Http\Controllers\SellerController::class,'ViewOrders']);

Route::get('/EndOrder/{id}',[App\Http\Controllers\SellerController::class,'EndOrder']);

Route::get('/CompletedOrders',[App\Http\Controllers\SellerController::class,'CompletedOrders']);

Route::get('/AddVoucher',[App\Http\Controllers\SellerController::class,'VoucherView']);
Route::get('/DeleteVoucher',[App\Http\Controllers\SellerController::class,'DeleteView']);

Route::get('/DeleteVoucher/{id}',[App\Http\Controllers\SellerController::class,'DeleteVoucher']);
Route::post('/AddVoucher',[App\Http\Controllers\SellerController::class,'StoreVoucher'])->name('StoreVoucher');

// Route::get('OrderDetails/{orderid}',[App\Http\Controllers\SellerController::class,'OrderDetails']);

//Customer

Route::get('/CustomerSignUp', [App\Http\Controllers\CustomerInfoController::class, 'CustomerSignUpView']);

// Route::get('/', [App\Http\Controllers\CustomerInfoController::class, 'CustomerSignUpView']);

Route::post('/Customer_registered', [App\Http\Controllers\CustomerInfoController::class, 'CustomerSignUp']);

Route::get('/CustomerLogin',[App\Http\Controllers\CustomerInfoController::class,'CustomerLoginView']);

Route::post('/LoggedIn',[App\Http\Controllers\CustomerInfoController::class,'CustomerLogin']);

Route::get('/UserProfile',[App\Http\Controllers\CustomerInfoController::class,'ProfileView']);

Route::get('/UserLogout',[App\Http\Controllers\CustomerInfoController::class,'UserLogout']);

Route::get('/CompletedOrdersCustomer',[App\Http\Controllers\CustomerInfoController::class,'CompletedOrdersCustomer']);

Route::get('/CheckOrders',[App\Http\Controllers\CustomerInfoController::class,'CheckOrders']);

Route::get('/RentedProducts',[App\Http\Controllers\CustomerInfoController::class,'RentedProducts']);


// Product

Route::get('/ListProduct',[App\Http\Controllers\ProductController::class,'index']);

Route::get('/DeleteProduct',[App\Http\Controllers\ProductController::class,'delete'])->name('DeleteProduct');

Route::get('/destroy/{id}',[App\Http\Controllers\ProductController::class,'destroy']);

Route::get('/RentProducts',[App\Http\Controllers\ProductController::class,'index_rent']);

Route::post('/CreateProduct',[App\Http\Controllers\ProductController::class,'store'])->name('CreateProduct');

Route::post('/CreateRentProduct',[App\Http\Controllers\ProductController::class,'store_rent'])->name('CreateRentProduct');

Route::get('/RentalProduct',[App\Http\Controllers\ProductController::class,'Rent_view']);

Route::get('/Product_approval',[App\Http\Controllers\ProductController::class,'approval']);

Route::get('/product_list',[App\Http\Controllers\ProductController::class,'show']);

Route::get('/set_product_approval/{product_id}', [App\Http\Controllers\ProductController::class, 'setapproval'])->name("set_product_approval");
Route::get('/decline_product_approval/{product_id}', [App\Http\Controllers\ProductController::class, 'declineapproval'])->name("decline_product_approval");

Route::get('set_rentproduct_approval/{product_id}', [App\Http\Controllers\ProductController::class, 'setRentapproval'])->name('set_rentproduct_approval');
Route::get('/decline_rentproduct_approval/{product_id}', [App\Http\Controllers\ProductController::class, 'declineRentapproval'])->name('decline_rentproduct_approval');

// Homepage

Route::get('/', [App\Http\Controllers\HomepageController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomepageController::class, 'index_home']);

Route::get('/product/{product_id}', [App\Http\Controllers\HomepageController::class, 'ShowProduct']);

Route::get('/rentproduct/{product_id}', [App\Http\Controllers\HomepageController::class, 'ShowRentProduct']);

// Cart

Route::get('/AddToCartRent/{product_id}', [App\Http\Controllers\CartController::class, 'AddToCartRent'])->name('AddToCartRent');

// Customizer

Route::get('/customize', [App\Http\Controllers\CustomizerController::class, 'index']);

Route::post('/customizer', [App\Http\Controllers\CustomizerController::class, 'store'])->name('customizersave');

Route::get('/addprints',[App\Http\Controllers\CustomizerController::class, 'addprint']);

Route::post('/addprints',[App\Http\Controllers\CustomizerController::class, 'store_print'])->name('store_print');

Route::get('/deleteprint',[App\Http\Controllers\CustomizerController::class, 'delete_print_view']);

Route::get('/delete_print/{id}',[App\Http\Controllers\CustomizerController::class, 'delete_print']);

Route::get('/delete_print/{id}',[App\Http\Controllers\CustomizerController::class, 'delete_print']);

//cart

Route::post('/cart/{product_id}', [App\Http\Controllers\CartController::class, 'AddToCart'])->name('CartData');

Route::get('/CustomerCart', [App\Http\Controllers\CartController::class, 'ViewCart']);

Route::get('/RentCart', [App\Http\Controllers\CartController::class, 'ViewRentCart']);

Route::post('/RentCartCheckout', [App\Http\Controllers\CartController::class, 'RentCartCheckout']);

Route::post('/updatecart/{product_id}/{size}', [App\Http\Controllers\CartController::class, 'UpdateCart'])->name('UpdateCartData');

Route::get('/deletecart/{product_id}/{size}', [App\Http\Controllers\CartController::class, 'DeleteCart'])->name('DeleteCartData');


//contact

Route::get('/ContactUs', [App\Http\Controllers\ContactController::class, 'ContactPage']);

Route::post('/Contacted', [App\Http\Controllers\ContactController::class, 'Contact']);

//review

Route::post('/SubmitReview', [App\Http\Controllers\ProductController::class, 'SubmitReview'])->name('SubmitReview');

Route::post('/EditReview', [App\Http\Controllers\ProductController::class, 'EditReview'])->name('EditReview');

//Orders

Route::get('/PurchaseOrders', [App\Http\Controllers\OrdersSellController::class, 'ViewCheckout']);

Route::post('/PurchaseOrdersChecked', [App\Http\Controllers\OrdersSellController::class, 'Checkout']);

//About Us

Route::get('/AboutUs', [App\Http\Controllers\AdminController::class, 'ViewAbout']);

//voucher

Route::post('/check_voucher/{product_id}', [App\Http\Controllers\vouchers::class, 'check_voucher'])->name('check_voucher');
