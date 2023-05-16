<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts= Account::query()->with('server.location')->where('user_id', auth()->id())->get();
        return view('customer.accounts.index')
            ->with(['accounts' => $accounts]);
    }
}
