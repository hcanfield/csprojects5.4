<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Cas;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    protected $redirectPath = '/';

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('cas', ['only' => ['CASLogin']]);
    }

    public function CASLogin()
    {
        // checks if user is a student (roleID == 1)
        // if student, then redirect to the student dashboard, if sponsor redirect to sponsor dashboard
        // else admin, redirect to admin page
        if(Auth::user()->roleID === 1)
        {
            return redirect()->action('Dashboard\DashboardController@getStudentDashboard');
        }
        elseif(Auth::user()->roleID === 2)
        {
            return redirect()->action('Dashboard\DashboardController@getSponsorDashboard');
        }
        else
        {
            return redirect('/admin');
        }
    }

    public function Logout()
    {
        if(is_null(Auth::user()->password))
        {
            Auth::logout();
            return redirect('/auth/caslogout');
        }
        Auth::logout();
        return redirect('/');
    }

    public function CASLogout()
    {
        CAS::logout();
        return redirect('/');
    }
}
