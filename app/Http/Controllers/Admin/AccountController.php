<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts= Account::query()->with('server')->latest()->paginate(50);
        return view('admin.accounts.index')->with(['accounts' => $accounts]);
    }
}
