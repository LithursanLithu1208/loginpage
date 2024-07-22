<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer; 

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $customer = Customer::where('email', $request->input('email'))->first();
            Auth::login($customer);
            return redirect('/home');
        } else {
            if (Customer::where('email', $request->input('email'))->exists()) {
                return back()->withErrors(['Invalid password']);
            } else {
                return back()->withErrors(['Invalid email']);
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
