<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SalesController;



Auth::routes();





Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/edit_profile', [HomeController::class, 'edit_profile'])->name('edit_profile');
Route::POST('/update_profile/{id}', [HomeController::class, 'update_profile'])->name('update_profile');
Route::get('/password_change/', [HomeController::class, 'update_password'])->name('update_password');




Route::resource('customer', CustomerController::class);
Route::resource('product', ProductController::class);
Route::resource('invoice', InvoiceController::class);
Route::get('/findPrice', [InvoiceController::class, 'findPrice'])->name('findPrice');
Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');


