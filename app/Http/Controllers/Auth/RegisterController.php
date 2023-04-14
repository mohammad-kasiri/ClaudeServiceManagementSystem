<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register.index');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
           'email'    => ['required', 'email'],
           'password' => ['required', 'confirmed']
        ]);
        $user = User::query()->create([
            'level'     => 'customer',
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);


        Auth::login($user);

        return session()->has('invoice')
            ? redirect()->route('invoice', ['invoice' => Invoice::query()->find(session('invoice'))->update(['user_id'=>auth()->id()])])
            : redirect()->route('index');
    }
}
