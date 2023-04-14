<?php

use App\Http\Controllers\Customer\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('panel')->name('panel.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

});
