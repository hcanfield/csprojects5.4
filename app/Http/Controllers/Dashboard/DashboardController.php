<?php namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Dashboard;
use App\Project;
use App\User;
use App\User_Bid;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getSponsorDashboard(Request $request) {
        // get the sponsor's info
        $user = Auth::user();
        // get all users from the db
        $allUsers = User::all();
        // get all of the sponsor's projects
        $projects = $user->projects;
        // for each of the sponsor's projects, see if there are bids on the projects
        // for each bid, if the project id of the bid matches the project id of the sponsor project
        // then find the user_id of the bid
        foreach($projects as $project)
        {
            $bids = $project->bids;
        }

        // for each bid, for each sponsor project look to see if bid->project_id == project->id
        // if match, $bids
        return view('sponsorDashboard')->with(compact('projects', 'user'))->with(compact('bids', 'user'));
    }

    public function getStudentDashboard(Request $request) {
        $user = Auth::user();
        $favorites = $user->favorites;
        $bids = $user->bids;
        $assigned = $user->projectsAssigned;
        $projects = Project::all();
        $allUsers = User::all();
        foreach($projects as $project)
        {
            foreach($allUsers as $allUser)
            {
                if($project->ownerID == $allUser->id)
                    $favorites->ownerName = $allUser->username;
                if($project->ownerID == $allUser->id)
                    $bids->ownerName = $allUser->username;
                if($project->ownerID == $allUser->id)
                    $assigned->ownerName = $allUser->username;
            }
        }
        foreach($favorites as $favorite)
        {
            foreach($allUsers as $allUser)
            {
                if($favorite->ownerID == $allUser->id)
                    $favorites->ownerName = $allUser->username;
            }
        }
        foreach($bids as $bid)
        {
            foreach($allUsers as $allUser)
            {
                if($bid->ownerID == $allUser->id)
                    $bids->ownerName = $allUser->username;
            }
        }
        return view('studentDashboard')->with(compact('favorites', 'user'))->with(compact('bids', 'user'))->with(compact('assigned', 'user'));
    }
}