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
Route::get('/login',[App\Http\Controllers\userController::class,'login']);
Route::post('/signup/',[App\Http\Controllers\userController::class,'signing']);
Route::post('/loging_in/',[App\Http\Controllers\userController::class,'loging']);
Route::get('/profile',[App\Http\Controllers\userController::class,'profile']);
Route::get('/logout',[App\Http\Controllers\userController::class,'logout']);
