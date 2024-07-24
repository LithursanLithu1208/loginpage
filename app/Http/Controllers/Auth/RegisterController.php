<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Send verification email
        $customer->sendEmailVerificationNotification();

        // return redirect('/login')->with('status', 'Registration successful! Please check your email for verification.');
        Auth::login($customer);

        return redirect()->route('verification.notice');
    }
}

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use App\Models\Customer;

// class RegisterController extends Controller
// {
//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|string|email|max:255|unique:customers',
//             'password' => 'required|string|min:8|confirmed',
//         ]);

//         $customer = Customer::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//         ]);

//         // Send verification email
//         $customer->sendEmailVerificationNotification();

//         // return redirect('/login')->with('status', 'Registration successful! Please check your email for verification.');
//         // Auth::login($customer);

//         return redirect()->route('verification.notice');
//     }
// }
