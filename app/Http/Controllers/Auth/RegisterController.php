<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Hash;
use App\User;
use Auth;
use Cas;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function putRegister(Request $request)
    {
        // validator for email & password
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        // check if email exists already, and if not add to database
        $email = User::where('email', $request->input('email'))->first();
        if(is_null($email))
        {
            $user = new User;
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->username = explode('@', $request->input('email')) [0];
            $user->roleID = 4;
            $user->save();
            Auth::login($user, true);
            return redirect()->action('Dashboard\DashboardController@getSponsorDashboard');
        }
        else
        {
            return redirect()->back()->withErrors('Already a user');

        }
    }
}