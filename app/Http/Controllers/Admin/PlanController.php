<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Period;
use App\Models\Plan;
use App\Models\Traffic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::query()->with('traffic')->with('period')->with('location')->latest()->get();
        return view('admin.plan.index')->with(['plans' => $plans]);
    }

    public function create()
    {
        $traffics = Traffic::query()->active()->orderBy('amount')->get();
        $periods  = Period::query()->active()->orderBy('total_days')->get();
        $locations= Location::query()->active()->get();

        return view('admin.plan.create')->with([
            'traffics'  => $traffics,
            'periods'   => $periods,
            'locations' => $locations
        ]);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'rrp_price'  => ['nullable'],
            'price'      => ['required']
        ]);

        $traffic = Traffic::query()->findOrFail($request->traffic_id);
        $period  = Period::query()->findOrFail($request->period_id);
        $location= Location::query()->findOrFail($request->location_id);

        $samePlanExists= Plan::query()
            ->where('location_id', $location->id)
            ->where('period_id', $period->id)
            ->where('traffic_id', $traffic->id)
            ->exists();

        if ($samePlanExists){
            Session::flash('message', ['warning' , 'پلن با این مشخصات در حال حاضر وجود دارد.']);
            return redirect()->back();
        }

        Plan::query()->create([
                'location_id'  => $location->id,
                'period_id'    => $period->id,
                'traffic_id'   => $traffic->id,
                'rrp_price'    => str_replace(',' , '' , $request->rrp_price),
                'price'        => str_replace(',' , '' , $request->price),
            ]);

        Session::flash('message', ['success' , 'پلن با موفقیت ایجاد شد.']);
        return redirect()->route('admin.plan.index');
    }

    public function edit(Plan $plan)
    {
        $traffics = Traffic::query()->active()->orderBy('amount')->get();
        $periods  = Period::query()->active()->orderBy('total_days')->get();
        $locations= Location::query()->active()->get();

        return view('admin.plan.edit')->with([
            'traffics'  => $traffics,
            'periods'   => $periods,
            'locations' => $locations,
            'plan'      => $plan
        ]);;
    }

    public function update(Request $request, Plan $plan)
    {
        $this->validate($request, [
            'rrp_price'  => ['nullable'],
            'price'      => ['required']
        ]);

        $traffic = Traffic::query()->findOrFail($request->traffic_id);
        $period  = Period::query()->findOrFail($request->period_id);
        $location= Location::query()->findOrFail($request->location_id);

        $samePlanExists= Plan::query()
            ->where('location_id', $location->id)
            ->where('period_id', $period->id)
            ->where('traffic_id', $traffic->id)
            ->where('id', '!=' , $plan->id)
            ->exists();

        if ($samePlanExists){
            Session::flash('message', ['warning' , 'پلن با این مشخصات در حال حاضر وجود دارد.']);
            return redirect()->back();
        }

        $plan->update([
            'location_id'  => $location->id,
            'period_id'    => $period->id,
            'traffic_id'   => $traffic->id,
            'rrp_price'    => ($request->has('rrp_price') && !is_null($request->input('rrp_price'))) ? str_replace(',' , '' , $request->rrp_price) : null,
            'price'        => str_replace(',' , '' , $request->price),
        ]);

        Session::flash('message', ['success' , 'پلن با موفقیت ویرایش شد.']);
        return redirect()->route('admin.plan.index');
    }

    public function switch_status(Plan $plan)
    {
        $plan->is_active = !$plan->is_active;
        $plan->save();
        return redirect()->back();
    }

    public function activation()
    {
        $locations= Location::query()->get();
        $periods=Period::query()->get();
        $traffics= Traffic::query()->get();

       return view('admin.activation.index')->with([
           'locations'  => $locations,
           'periods'    => $periods,
           'traffics'   => $traffics,
       ]);
    }

    public function activate_all()
    {
        Plan::query()->update([
           'is_active'  => true,
        ]);

        Session::flash('message', ['success' , ' همه ی پلن ها با موفقیت فعال شدند.']);
        return redirect()->back();
    }

    public function deactivate_all()
    {
        Plan::query()->update([
            'is_active'  => false,
        ]);

        Session::flash('message', ['success' , ' همه ی پلن ها با موفقیت غیر فعال شدند.']);
        return redirect()->back();
    }

    public function activate_status(Request $request)
    {
        $plans= Plan::query();

        if ($request->has('location_id') && !is_null($request->input('location_id')))
            $plans = $plans->where('location_id', $request->input('location_id'));

        if ($request->has('period_id') && !is_null($request->input('period_id')))
            $plans = $plans->where('period_id', $request->input('period_id'));

        if ($request->has('traffic_id') && !is_null($request->input('traffic_id')))
            $plans = $plans->where('traffic_id', $request->input('traffic_id'));

        $plans->update([
            'is_active'  => true
        ]);

        Session::flash('message', ['success' , $plans->count(). ' پلن با موفقیت فعال شدند. ']);
        return redirect()->back();
    }
}
