<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PanisPayGateway;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions= PanisPayGateway::query()
            ->with('invoice.user')
            ->latest()
            ->get();

        return view('admin.transactions.index')->with([
            'transactions'  => $transactions
        ]);
    }
}
