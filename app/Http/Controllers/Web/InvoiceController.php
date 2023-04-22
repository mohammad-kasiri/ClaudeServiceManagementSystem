<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Invoice $invoice)
    {
        return view('web.invoice')->with(['invoice' => $invoice]);
    }
}
