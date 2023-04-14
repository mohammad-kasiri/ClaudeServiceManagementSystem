<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Location;
use App\Models\Period;
use App\Models\Plan;
use App\Models\Traffic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $plans    = Plan::query()->with('location')->with('period')->with('traffic')->active()->get();
        $locations = Location::query()->whereIn('id', array_keys($plans->groupBy('location_id')->toArray()))->get();
        $periods  = Period::query()->whereIn('id', array_keys($plans->groupBy('period_id')->toArray()))->get();

        return view('web.index')->with([
            'locations' => $locations,
            'plans'     => $plans,
            'periods'   => $periods,
        ]);
    }

    public function buy(Plan $plan)
    {
        if (!$plan->is_active)
            abort(404);

        $invoice= Invoice::query()->create([
            'user_id'       => auth()->check()? auth()->id(): null,
            'plan_id'       => $plan->id,
            'period_id'     => $plan->period_id,
            'traffic_id'    => $plan->traffic_id,
            'discount_id'   => $plan->discount_id,
            'plan_price'    => $plan->price,
            'plan_rrp_price'=> is_null($plan->rrp_price) ? 0 : $plan->rrp_price,
            'payable_price' => $plan->price * 1,
            'quantity'      => 1,
            'status'        => 'awaiting',
            'type'          => 'buy',
        ]);

        session()->put('invoice' , $invoice->id);

        return auth()->check()
            ? redirect()->route('invoice', ['invoice' => $invoice])
            : redirect()->route('auth.login.index');
    }
}
