<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class ForgotPasswordContreoller extends Controller
{
    //
    public function showForgotPasswordForm(){
        return view('auth.forgotPassword');
    }

    public function submitForgotPasswordForm(Request $request){
        $request->validate([
            'email'=>'required|email|exists:customers'
        ]);

        $token = Str::random(64);
        DB::table('pasword_resets')->insert([
            'email'=>$request->input('email'),
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);

        Mail::send('email.forgotPassword',['token'=>$token],function($message) use($request){
           $message->to($request->input('email')); 
           $message->subject('Reset Password');
        });
        return back()->with('message','we have send researt password link');
    }

    public function showResetPasswordForm($token){
        return view('auth.forgotPasswordLink',['token'=>$token]);
    }

    public function submitResetPasswordForm(Request $request){
        $request->validate([
            'email'=>'required|email|exists:customers',
            'password'=>'required|min:8|confirmed',
            'password_confirmation'=>'required'
        ]);
        $password_reset_request = DB::table('pasword_resets')
        ->where('email',$request->input('email'))
        ->where('token',$request->token)
        ->first();

        if(!$password_reset_request){
            return back()->with('error',"Invalid Token");
        }
        customer::where('email',$request->input('email'))
        ->update(['password'=>Hash::make($request->input('password'))]);

        DB::table('pasword_resets')
        ->where('email',$request->input('email'))
         ->delete();

         return redirect('/login')->with('message',"Your password has been changed");
    }
}
