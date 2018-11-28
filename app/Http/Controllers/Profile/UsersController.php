<?php namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use App\Http\Controllers\Controller;

class UsersController //extends Controller
{
    // update a user's profile
    public function putUpdateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = Auth::user();

        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->languages = $request->input('languages');
        $user->skills = $request->input('skills');
        $user->web_link = $request->input('web_link');
        $user->research_area = $request->input('research_area');
        $user->save();

        return view('profile')->with(compact('user'));
        // return response that user was update successfully
    }

    public function getUpdateUser()
    {
        $user = Auth::user();
        return view('editProfile')->with(compact('user'));
    }

    public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully uploaded image.');

    }

    public function putResume(Request $request)
    {

        $user = Auth::user();
        $resumeName = $user->id.'_resume'.time().'.'.request()->resume->getClientOriginalExtension();
        $request->resume->storeAs('resumes',$resumeName);

        $user->resume = $resumeName;
        $user->save();

        return back()
            ->with('success','You have successfully uploaded resume.');
    }

    public function getProfile($username)
    {
        $user = User::where('username', $username)->first();
        return view('profile')->with(compact('user'));
    }
} // end class
