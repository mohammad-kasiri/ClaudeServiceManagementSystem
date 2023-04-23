<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices= Invoice::query()
            ->where('user_id', auth()->id())
            ->with('plan.location')
            ->with('traffic')
            ->with('period')
            ->latest()
            ->get();

        return view('customer.invoices.index')->with([
            'invoices'  => $invoices
        ]);
    }
}
