<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('customer.profile.edit');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'    => ['nullable', 'max:30'],
            'mobile'  => ['nullable', 'regex:/(09)[0-9]{9}/', 'digits:11', 'numeric'],
        ]);

        $user= auth()->user();
        $user->name  = $request->name;
        $user->mobile  = $request->mobile;

        if($request->has('password')){
            if ($request->input('password') != $request->input('password_confirmation'))
            {
                throw ValidationException::withMessages([
                    'password' => 'پسورد و تکرار آن با هم یکسان نیستند'
                ]);
            }
            $user->password = Hash::make($request->password);
        }

        $user->save();
        Session::flash('message', ['success' , 'پروفایل با موفقیت ویرایش شد!']);
        return redirect()->back();
    }
}
