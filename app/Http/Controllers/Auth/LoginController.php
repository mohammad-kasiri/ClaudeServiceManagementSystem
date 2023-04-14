<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login.index');
    }
    public function login(Request $request)
    {
        $user = User::query()->where('email', $request->email)->first();


        if (!$user or !Hash::check($request->password, $user->password) or !$user->is_active) {
            throw ValidationException::withMessages([
                'password' => __('auth.login.messages.failed')
            ]);
        }

        Auth::login($user,  $request->has('remember'));

        return session()->has('invoice')
             ? redirect()->route('invoice', ['invoice' => Invoice::query()->find(session()->get('invoice'))->update(['user_id'=>auth()->id()])])
             : redirect()->route('index');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login.index');
    }
}
