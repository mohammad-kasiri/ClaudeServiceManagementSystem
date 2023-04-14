<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PeriodController extends Controller
{
    public function index()
    {
        $periods= Period::query()->latest()->get();
        return view('admin.period.index')->with(['periods' => $periods]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => ['required' , 'max:30'],
            'total_days'  => ['required' , 'numeric', 'max:370'],
        ]);
        Period::query()->create([
            'title'         => $request->title,
            'total_days'    => $request->total_days,
        ]);

        Session::flash('message', ['success' , 'بازه زمانی با موفقیت ایجاد شد!']);
        return redirect()->route('admin.period.index');
    }

    public function edit(Period $period)
    {
        return view('admin.period.edit')->with(['period' => $period]);
    }

    public function update(Request $request, Period $period)
    {
        $this->validate($request, [
            'title'     => ['required' , 'max:30'],
            'is_active' => ['required' , 'in:0,1']
        ]);

        $period->update([
            'title'     => $request->title,
            'is_active' => $request->is_active
        ]);

        Session::flash('message', ['primary' , 'بازه زمانی با موفقیت ویرایش شد!']);
        return redirect()->route('admin.period.index');
    }

    public function switch_status(Period $period)
    {
        $period->is_active = !$period->is_active;
        $period->save();
        return redirect()->back();
    }
}
