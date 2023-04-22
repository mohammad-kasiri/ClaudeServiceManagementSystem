<?php

use App\Http\Controllers\Customer\AccountController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\InvoiceController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\TransactionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('panel')->name('panel.')->group(function () {
    Route::get('/',             [HomeController::class, 'index'])           ->name('index');
    Route::get('/accounts',     [AccountController::class, 'index'])        ->name('accounts.index');
    Route::get('/invoices',     [InvoiceController::class, 'index'])        ->name('invoice.index');

    Route::get('/profile',      [ProfileController::class, 'edit'])         ->name('profile.edit');
    Route::patch('/profile',    [ProfileController::class, 'update'])       ->name('profile.update');
});
