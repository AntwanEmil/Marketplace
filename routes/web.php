<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
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


Route::get('/', [ItemController::class,'index']);

Route::get('/profile',[ProfileController::class,'index']);
Route::get('/editProfile', function() {return view('user.EditProfileScreen');});

Route::get('/productDetails', function() {return view('products.ProductDetails');});

Route::get('/addProduct',function() {return view('products.AddProduct');});
Route::post('/addProduct', [ItemController::class, 'store']);

Route::get('/editProduct', function() {return view('products.EditProduct');});

Route::get('/signIn', function() {return view('auth.SignInScreen');});
Route::get('/register', function() {return view('auth.RegisterScreen');});

Route::get('/error', function() {return view('components.Error');});