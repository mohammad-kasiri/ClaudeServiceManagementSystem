<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServerController extends Controller
{
    protected $fillable=['location_id', 'title' , 'description', 'address', 'port', 'username', 'password', 'capacity', 'active_accounts', 'min_port', 'max_port', 'is_active'];

    public function index()
    {

        Server::query()->first()->getEmptyPort();
        $servers= Server::query()->with('location')->get();
        return view('admin.server.index')->with([
            'servers' => $servers
        ]);
    }
    public function create()
    {
        $locations= Location::query()->active()->get();
        return view('admin.server.create')->with([
            'locations' => $locations
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'description'       => ['nullable'] ,
            'address'           => ['required'] ,
            'port'              => ['required' , 'numeric'] ,
            'protocol'          => ['required' , 'in:http,https'] ,
            'user'              => ['required'] ,
            'pass'              => ['required'] ,
            'capacity'          => ['required', 'numeric'] ,
            'min_port'          => ['required' , 'numeric'] ,
            'max_port'          => ['required' , 'numeric'] ,
            'max_port'          => ['required' , 'numeric'] ,
        ]);


        $location = Location::query()->active()->where('id', $request->location_id)->firstOrFail();

        Server::query()->create([
            'location_id'       => $location->id,
            'title'             => $request->title,
            'description'       => $request->description,
            'address'           => $request->address,
            'port'              => $request->port,
            'protocol'          => $request->protocol,
            'user'              => $request->user,
            'pass'              => $request->pass,
            'capacity'          => $request->capacity,
            'min_port'          => $request->min_port,
            'max_port'          => $request->max_port,
            'current_port'      => $request->max_port,
        ]);

        Session::flash('message', ['success' , 'سرور با موفقیت ایجاد شد.']);
        return redirect()->route('admin.server.index');
    }
    public function edit(Server $server)
    {
        $locations= Location::query()->active()->get();
        return view('admin.server.edit')->with([
            'locations' => $locations,
            'server'   => $server
        ]);
    }
    public function update(Server $server, Request $request)
    {
        $this->validate($request, [
            'description'       => ['nullable'] ,
            'address'           => ['required'] ,
            'port'              => ['required' , 'numeric'] ,
            'protocol'          => ['required' , 'in:http,https'] ,
            'user'              => ['required'] ,
            'pass'              => ['required'] ,
            'capacity'          => ['required', 'numeric'] ,
            'min_port'          => ['required' , 'numeric'] ,
            'max_port'          => ['required' , 'numeric'] ,
        ]);

        $location = Location::query()->active()->where('id', $request->location_id)->firstOrFail();

       $server->update([
            'location_id'       => $location->id,
            'description'       => $request->description,
            'address'           => $request->address,
            'port'              => $request->port,
            'protocol'          =>  $request->protocol,
            'username'          => $request->username,
            'password'          => $request->password,
            'capacity'          => $request->capacity,
            'min_port'          => $request->min_port,
            'max_port'          => $request->max_port,
        ]);

        Session::flash('message', ['success' , 'سرور با موفقیت ویرایش شد.']);
        return redirect()->route('admin.server.index');
    }

    public function switch_status(Server $server)
    {
        $server->is_active = !$server->is_active;
        $server->save();
        return redirect()->back();
    }
}
