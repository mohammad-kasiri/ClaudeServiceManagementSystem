<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users= User::query()->count();


        $sell_count = Invoice::query()
            ->where('status', 'completed')
            ->whereDate('created_at' ,'>', Carbon::today()->firstWeekDay)
            ->count();

        $sell_amount= Invoice::query()
            ->where('status', 'completed')
            ->whereDate('created_at' ,'>', Carbon::today()->firstWeekDay)
            ->sum('payable_price');

        $invoices = Invoice::query()->with('user')->latest()->take(10)->get();

        return view('admin.index')->with([
            'users'         => $users,
            'sell_count'    => $sell_count,
            'sell_amount'   => $sell_amount,

            'invoices'      => $invoices,
        ]);
    }
}
