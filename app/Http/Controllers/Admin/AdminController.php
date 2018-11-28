<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use App\Project;
use Hash;
use App\Http\Controllers\Controller;

class AdminController
{
    // shows all projects
    public function getProjects()
    {
        $projects = Project::all();
        return view('admin_projects')->with(compact('projects'));
    }

    // shows all current users
    public function getUsers()
    {
        $users = User::all();
        return view('admin_users')->with(compact('users'));
    }

    public function archiveProject($id)
    {

        $toArchive = Project::find($id);
        $toArchive->status = "Archived";
        $toArchive->save();
        return redirect()->action('Admin\AdminController@getProjects');
    }

    public function reset_password($id)
    {
        $user = User::find($id);
        return view('password_reset')->with(compact('user'));
    }

    public function put_reset_password($id, Request $request)
    {
        $user = User::find($id);
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->action('Admin\AdminController@getUsers');
    }
}