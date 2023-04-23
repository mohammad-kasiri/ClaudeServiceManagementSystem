<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\Plan;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if (!session()->has('cart'))
            abort(401);

        $cart= new Cart(json_decode(session()->get('cart')));

        return view('web.cart')->with(['cart' => $cart]);
    }

    public function incrementQuantity()
    {
        if (!session()->has('cart'))
            abort(401);

        $data= json_decode(session()->get('cart'));
        $data->quantity = property_exists($data, 'quantity')
            ? $data->quantity + 1
            : 2;
        $data->discount_id = property_exists($data, 'discount_id')
            ? $data->discount_id
            : null;
        $cart= new Cart($data);
        session()->put('cart' , json_encode(['plan_id' => $cart->plan->id , 'quantity' => $cart->quantity]));
        return redirect()->back();
    }

    public function decrementQuantity()
    {
        if (!session()->has('cart'))
            abort(401);

        $data= json_decode(session()->get('cart'));

        $data->quantity = property_exists($data, 'quantity') &&  $data->quantity != 1
            ? $data->quantity - 1
            : 1;

        $data->discount_id = property_exists($data, 'discount_id')
            ? $data->discount_id
            : null;


        $cart= new Cart($data);
        session()->put('cart' , json_encode(['plan_id' => $cart->plan->id , 'quantity' => $cart->quantity]));
        return redirect()->back();
    }

    public function applyDiscountCode(Request $request)
    {
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

        $data= json_decode(session()->get('cart'));

        $data->quantity = property_exists($data, 'quantity')
            ? $data->quantity
            : 1;

        $data->discount_id = property_exists($data, 'discount_id')
            ? $discount->id
            : null;

        $cart= new Cart($data);
        session()->put('cart' , json_encode([
            'plan_id'       => $cart->plan->id ,
            'quantity'      => $cart->quantity,
            'discount_id'   => $discount->id
        ]));

        return redirect()->back();
    }
}
