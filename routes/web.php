<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/ProductDetail/{id}', [ItemController::class, 'ViewItem']);
Route::get('/myProdForSale/{id}', [ItemController::class, 'DetailForSale']);
Route::delete('/delete/{id}', [ItemController::class, 'destroy'])->name('products.ProductDetails');

Route::get('/addProduct', function () {return view('products.AddProduct');});
Route::post('/addProduct', [ItemController::class, 'store']);

Route::get('/editProfile/{id}', [ProfileController::class,'View']);
Route::post('/updateProfile',[ProfileController::class, 'updatePro'])->name('updateProfile');


Route::get('/editProduct/{id}', [ItemController::class,'View']);
Route::post('/updateProduct/{id}', [ItemController::class, 'Update'])->name('updateProduct');

Route::get('/search', 'App\Http\Controllers\ItemController@search');

Route::get('/error', function () {return view('components.Error');});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/report', [App\Http\Controllers\ReportController::class, 'index']);


