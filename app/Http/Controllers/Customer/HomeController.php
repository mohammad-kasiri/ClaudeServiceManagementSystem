<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Invoice;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $unAnsweredTickets= Ticket::query()
            ->where('status', 'answered')
            ->where('user_id', auth()->id())
            ->count();

        $activeAccounts= Account::query()
            ->where('user_id', auth()->id())
            ->where('status', 'created')
            ->whereDate('xui_expire_at', '>', Carbon::now())
            ->count();

        $activeInvoices= Invoice::query()
            ->where('user_id', auth()->id())
            ->count();

        $accounts= Account::query()
            ->where('user_id', auth()->id())
            ->where('status', 'created')
            ->whereDate('xui_expire_at', '>', Carbon::now())
            ->latest()
            ->take(10)
            ->get();


        return view('customer.index')
            ->with('unAnsweredTickets', $unAnsweredTickets)
            ->with('activeAccounts', $activeAccounts)
            ->with('activeInvoices', $activeInvoices)
            ->with('accounts', $accounts);
    }
}
