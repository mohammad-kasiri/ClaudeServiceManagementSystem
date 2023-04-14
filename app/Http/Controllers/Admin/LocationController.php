<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations= Location::query()->get();
        return view('admin.location.index')->with(['locations' => $locations]);
    }

    public function switch_status(Location $location)
    {
        $location->is_active = !$location->is_active;
        $location->save();
        return redirect()->back();
    }
}
