<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users= User::query()->orderBy('level', 'DESC')->latest()->paginate(50);
        return view('admin.users.index')->with(['users' => $users]);
    }

    public function switch_status(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();
        return redirect()->back();
    }

}
