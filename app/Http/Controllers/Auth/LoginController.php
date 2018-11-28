<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Cas;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function putLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->action('Dashboard\DashboardController@getSponsorDashboard');
        }
        else
        {
            return redirect()->back()->withErrors('Invalid Email/Password Combination');
        }
    }
}
