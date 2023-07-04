<?php

use App\Http\Controllers\Customer\AccountController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\InvoiceController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\TicketController;
use App\Http\Controllers\Customer\TicketMessageController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('panel')->name('panel.')->group(function () {
    Route::get('/',                                 [HomeController::class, 'index'])          ->name('index');
    Route::get('/accounts',                         [AccountController::class, 'index'])       ->name('accounts.index');
    Route::get('/accounts/{account}/change',        [AccountController::class, 'change'])       ->name('accounts.change');

    Route::get('/invoices',                         [InvoiceController::class, 'index'])       ->name('invoice.index');

    Route::get('/tickets',                          [TicketController::class, 'index'])        ->name('ticket.index');
    Route::get('/tickets/create',                   [TicketController::class, 'create'])       ->name('ticket.create');
    Route::post('/tickets/',                        [TicketController::class, 'store'])        ->name('ticket.store');

    Route::get('/tickets/{ticket}/messages',        [TicketMessageController::class, 'index']) ->name('ticket.message.index');
    Route::post('/tickets/{ticket}/messages',       [TicketMessageController::class, 'store']) ->name('ticket.message.store');

    Route::get('/profile',                          [ProfileController::class, 'edit'])        ->name('profile.edit');
    Route::patch('/profile',                        [ProfileController::class, 'update'])      ->name('profile.update');
});
