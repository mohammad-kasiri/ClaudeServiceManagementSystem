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
        if ($invoice->user_id != auth()->id())
            abort(403);

        session()->forget(['invoice']);
        return view('web.invoice')->with(['invoice' => $invoice]);
    }

    public function incrementQuantity(Invoice $invoice)
    {
        if ($invoice->user_id != auth()->id())
            abort(403);
        $invoice->incrementQuantity();
        return redirect()->back();
    }

    public function decrementQuantity(Invoice $invoice)
    {
        if ($invoice->user_id != auth()->id())
            abort(403);
        $invoice->decrementQuantity();
        return redirect()->back();
    }

    public function applyDiscountCode(Request $request,Invoice $invoice)
    {
        if ($invoice->user_id != auth()->id())
            abort(403);

        $this->validate($request, [
           'discount_code' => 'required|max:128',
        ]);

        $discount= Discount::query()->where('code', $request->discount_code)->first();
        if (!$discount)
            return response()->json(['error' => 'کد تخفیف وارد شده معتبر نمی باشد']);

        if (!$discount->is_active)
            return response()->json(['error' => 'کد تخفیف وارد شده فعال نمی باشد']);

        if ($discount->hasTheCapacityBeenCompleted())
            return response()->json(['error' => 'ظرفیت استفاده از این کد تخفیف تکمیل شده است']);

        $invoice->applyDiscountCode($discount);
        return redirect()->back();
    }
}
