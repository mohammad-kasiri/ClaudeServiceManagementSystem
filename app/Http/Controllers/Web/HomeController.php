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

        session()->put('cart' , json_encode(['plan_id' => $plan->id]));

        return  redirect()->route('cart');
    }
}
