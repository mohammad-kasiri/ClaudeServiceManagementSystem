<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PeriodController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ServerController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\TicketMessageController;
use App\Http\Controllers\Admin\TrafficController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
Route::middleware(['auth' , 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::get('/user',                             [UserController::class, 'index'])             ->name('user.index');
    Route::get('/user/{user}/switch_status',        [UserController::class, 'switch_status'])     ->name('user.switch_status');
    Route::post('/user',                            [UserController::class, 'store'])             ->name('user.store');
    Route::get('/user/{user}/edit',                 [UserController::class, 'edit'])              ->name('user.edit');
    Route::patch('/user/{user}',                    [UserController::class, 'update'])            ->name('user.update');
    Route::post('/user/activate_status',            [UserController::class, 'activate_status'])   ->name('user.activate_status');

    Route::get('/account',                          [AccountController::class, 'index'])          ->name('account.index');
    Route::get('/account/{account}/switch_status',  [AccountController::class, 'switch_status'])  ->name('account.switch_status');
    Route::post('/account',                         [AccountController::class, 'store'])          ->name('account.store');
    Route::get('/account/{account}/edit',           [AccountController::class, 'edit'])           ->name('account.edit');
    Route::patch('/account/{account}',              [AccountController::class, 'update'])         ->name('account.update');
    Route::post('/account/activate_status',         [AccountController::class, 'activate_status'])->name('account.activate_status');


    Route::get('/location',                         [LocationController::class, 'index'])         ->name('location.index');
    Route::get('/location/{location}/switch_status',[LocationController::class, 'switch_status']) ->name('location.switch_status');

    Route::get('/traffic',                          [TrafficController::class, 'index'])          ->name('traffic.index');
    Route::get('/traffic/{traffic}/switch_status',  [TrafficController::class, 'switch_status'])  ->name('traffic.switch_status');
    Route::post('/traffic',                         [TrafficController::class, 'store'])          ->name('traffic.store');
    Route::get('/traffic/{traffic}/edit',           [TrafficController::class, 'edit'])           ->name('traffic.edit');
    Route::patch('/traffic/{traffic}',              [TrafficController::class, 'update'])         ->name('traffic.update');

    Route::get('/period',                           [PeriodController::class, 'index'])           ->name('period.index');
    Route::get('/period/{period}/switch_status',    [PeriodController::class, 'switch_status'])   ->name('period.switch_status');
    Route::post('/period',                          [PeriodController::class, 'store'])           ->name('period.store');
    Route::get('/period/{period}/edit',             [PeriodController::class, 'edit'])            ->name('period.edit');
    Route::patch('/period/{period}',                [PeriodController::class, 'update'])          ->name('period.update');

    Route::get('/plan/activation',                  [PlanController::class, 'activation'])        ->name('plan.activation');
    Route::get('/plan/activate_all',                [PlanController::class, 'activate_all'])      ->name('plan.activate_all');
    Route::get('/plan/deactivate_all',              [PlanController::class, 'deactivate_all'])    ->name('plan.deactivate_all');
    Route::post('/plan/activate_status',            [PlanController::class, 'activate_status'])   ->name('plan.activate_status');

    Route::get('/plan',                             [PlanController::class, 'index'])             ->name('plan.index');
    Route::get('/plan/{plan}/switch_status',        [PlanController::class, 'switch_status'])     ->name('plan.switch_status');
    Route::get('/plan/create',                      [PlanController::class, 'create'])            ->name('plan.create');
    Route::post('/plan',                            [PlanController::class, 'store'])             ->name('plan.store');
    Route::get('/plan/{plan}/edit',                 [PlanController::class, 'edit'])              ->name('plan.edit');
    Route::patch('/plan/{plan}',                    [PlanController::class, 'update'])            ->name('plan.update');

    Route::get('/server',                           [ServerController::class, 'index'])           ->name('server.index');
    Route::get('/server/{server}/switch_status',    [ServerController::class, 'switch_status'])   ->name('server.switch_status');
    Route::get('/server/create',                    [ServerController::class, 'create'])          ->name('server.create');
    Route::post('/server',                          [ServerController::class, 'store'])           ->name('server.store');
    Route::get('/server/{server}/edit',             [ServerController::class, 'edit'])            ->name('server.edit');
    Route::patch('/server/{server}',                [ServerController::class, 'update'])          ->name('server.update');

    Route::get('/discount',                         [DiscountController::class, 'index'])         ->name('discount.index');
    Route::get('/discount/{discount}/switch_status',[DiscountController::class, 'switch_status']) ->name('discount.switch_status');
    Route::get('/discount/create',                  [DiscountController::class, 'create'])        ->name('discount.create');
    Route::post('/discount',                        [DiscountController::class, 'store'])         ->name('discount.store');
    Route::get('/discount/{discount}/edit',         [DiscountController::class, 'edit'])          ->name('discount.edit');
    Route::patch('/discount/{discount}',            [DiscountController::class, 'update'])        ->name('discount.update');

    Route::get('/tickets',                          [TicketController::class, 'index'])          ->name('ticket.index');
    Route::get('/tickets/{ticket}/close',           [TicketController::class, 'close'])          ->name('ticket.close');
    Route::get('/tickets/{ticket}/pending',         [TicketController::class, 'pending'])        ->name('ticket.pending');

    Route::get('/tickets/{ticket}/messages',        [TicketMessageController::class, 'index'])   ->name('ticket.message.index');
    Route::post('/tickets/{ticket}/messages',       [TicketMessageController::class, 'store'])   ->name('ticket.message.store');


    Route::get('/invoice',                          [InvoiceController::class, 'index'])          ->name('invoice.index');
    Route::get('/transactions',                     [TransactionController::class, 'index'])      ->name('transaction.index');
});
