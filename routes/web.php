<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\InvoiceController;
use App\Http\Controllers\Web\PurchaseController;
use Illuminate\Support\Facades\Route;

Route::get('/',                             [HomeController::class , 'index'])      ->name('index');
Route::get('/buy/{plan}',                   [HomeController::class , 'buy'])        ->name('buy');
Route::get('/invoice/{invoice}',            [InvoiceController::class, 'index'])    ->name('invoice');

Route::get('/purchase/{invoice}',           [PurchaseController::class, 'pay'])     ->name('purchase');
Route::get('/purchase/{invoice}/callback',  [PurchaseController::class, 'callback'])->name('callback');

Route::get('/invoice/{invoice}/increment',  [InvoiceController::class, 'incrementQuantity'])  ->name('invoice.increment');
Route::get('/invoice/{invoice}/decrement',  [InvoiceController::class, 'decrementQuantity'])  ->name('invoice.decrement');
Route::post('/invoice/{invoice}/discount',  [InvoiceController::class, 'applyDiscountCode'])  ->name('invoice.discount');







#===================================================== Authentication ==========================================================#
Route::get('logout' , [LoginController::class , 'logout'])->name('auth.logout');
Route::middleware(['guest'])->group(function (){
  Route::get('login',       [LoginController::class,      'index'])->name('auth.login.index');
  Route::post('login',      [LoginController::class,      'login'])->name('auth.login.login');
  Route::get('register',    [RegisterController::class,   'index'])->name('auth.register.index');
  Route::post('register',   [RegisterController::class,   'register'])->name('auth.register.register');
});
