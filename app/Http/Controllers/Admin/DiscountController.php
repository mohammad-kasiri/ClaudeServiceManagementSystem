<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts= Discount::query()->latest()->get();
        return view('admin.discount.index')->with(['discounts' => $discounts]);
    }

    public function create()
    {
        return view('admin.discount.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code'       => ['required' , 'max:64'],
            'amount'     => ['required', 'numeric'],
            'type'       => ['required', 'in:percent,specific'],
            'limitation' => ['required', 'numeric', 'min:1'],
        ]);

        if ($request->type=='percent' && ($request->amount > 100 || $request->amount < 0))
            throw ValidationException::withMessages([
                'amount' => 'کد تخفیف درصدی باید بین 1 تا 100 باشد.'
            ]);

        Discount::query()->create([
            'code'       => $request->code,
            'amount'     => $request->amount,
            'type'       => $request->type,
            'limitation' => $request->limitation,
        ]);

        Session::flash('message', ['success' , 'کد تخفیف با موفقیت ایجاد شد.']);
        return redirect()->route('admin.discount.index');
    }

    public function edit(Discount $discount)
    {
        return view('admin.discount.edit')->with([
            'discount'      => $discount
        ]);
    }

    public function update(Request $request, Discount $discount)
    {
        $this->validate($request, [
            'code'       => ['required' , 'max:64'],
            'amount'     => ['required', 'numeric'],
            'type'       => ['required', 'in:percent,specific'],
            'limitation' => ['required', 'numeric', 'min:1'],
        ]);

        if ($request->type=='percent' && ($request->amount > 100 || $request->amount < 0))
                throw ValidationException::withMessages([
                    'amount' => 'کد تخفیف درصدی باید بین 1 تا 100 باشد.'
                ]);


        $discount->update([
            'code'       => $request->code,
            'amount'     => $request->amount,
            'type'       => $request->type,
            'limitation' => $request->limitation,
        ]);

        Session::flash('message', ['success' , 'کد تخفیف با موفقیت ویرایش شد.']);
        return redirect()->route('admin.discount.index');
    }

    public function switch_status(Discount $discount)
    {
        $discount->is_active = !$discount->is_active;
        $discount->save();
        return redirect()->back();
    }
}
