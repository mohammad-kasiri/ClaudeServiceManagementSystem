<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Traffic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TrafficController extends Controller
{
    public function index()
    {
        $traffic= Traffic::query()->latest()->get();
        return view('admin.traffic.index')->with(['traffic' => $traffic]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'   => ['required' , 'max:30'],
            'amount'  => ['required' , 'numeric', 'max:1000'],
        ]);
        Traffic::query()->create([
            'title'     => $request->title,
            'amount'    => $request->amount,
        ]);

        Session::flash('message', ['success' , 'ترافیک با موفقیت ایجاد شد!']);
        return redirect()->route('admin.traffic.index');
    }

    public function edit(Traffic $traffic)
    {
        return view('admin.traffic.edit')->with(['traffic' => $traffic]);
    }

    public function update(Request $request, Traffic $traffic)
    {
        $this->validate($request, [
            'title'     => ['required' , 'max:30'],
            'is_active' => ['required' , 'in:0,1']
        ]);

        $traffic->update([
            'title'     => $request->title,
            'is_active' => $request->is_active
        ]);

        Session::flash('message', ['primary' , 'ترافیک با موفقیت ویرایش شد!']);
        return redirect()->route('admin.traffic.index');
    }

    public function switch_status(Traffic $traffic)
    {
        $traffic->is_active = !$traffic->is_active;
        $traffic->save();
        return redirect()->back();
    }
}
