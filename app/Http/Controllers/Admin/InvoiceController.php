<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices= Invoice::query()
            ->with('plan.location')
            ->with('traffic')
            ->with('period')
            ->latest()
            ->get();

        return view('admin.invoice.index')->with([
            'invoices'  => $invoices
        ]);
    }
}
