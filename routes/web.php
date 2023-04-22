<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\InvoiceController;
use App\Http\Controllers\Web\PaymentController;
use App\Http\Controllers\Web\PurchaseController;
use Illuminate\Support\Facades\Route;

Route::get('/',                             [HomeController::class , 'index'])      ->name('index');
Route::get('/buy/{plan}',                   [HomeController::class , 'buy'])        ->name('buy');

Route::get('/cart',                         [CartController::class, 'index'])              ->name('cart');
Route::get('/cart/increment',               [CartController::class, 'incrementQuantity'])  ->name('cart.increment');
Route::get('/cart/decrement',               [CartController::class, 'decrementQuantity'])  ->name('cart.decrement');
Route::post('/cart/discount',               [CartController::class, 'applyDiscountCode'])  ->name('cart.discount');

Route::post('/purchase',                    [PurchaseController::class, 'pay'])     ->name('purchase')->middleware(['auth']);
Route::post('/purchase/{invoice}/callback',  [PurchaseController::class, 'callback'])->name('callback');











#===================================================== Authentication ==========================================================#
Route::get('logout' , [LoginController::class , 'logout'])->name('auth.logout');
Route::middleware(['guest'])->group(function (){
  Route::get('login',       [LoginController::class,      'index'])->name('auth.login.index');
  Route::post('login',      [LoginController::class,      'login'])->name('auth.login.login');
  Route::get('register',    [RegisterController::class,   'index'])->name('auth.register.index');
  Route::post('register',   [RegisterController::class,   'register'])->name('auth.register.register');
});
