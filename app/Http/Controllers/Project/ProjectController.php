<?php namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use App\Project;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    // update a sponsor's project
    public function putProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $project = new Project;
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->status = $request->input('status');
        $project->ownerID = Auth::user()->id;
        $project->people_needed = $request->input('people_needed');
        $project->skills = $request->input('skills');
        $project->category = $request->input('category');
        $project->save();

        return redirect()->action('Dashboard\DashboardController@getSponsorDashboard');
    }


    public function getProject() {
        return view('addProject');
    }

    public function getUpdateProject($id) {
        // finds the project with the given id

        $project = Project::with("bids")->find($id);


        return view('editProject')->with(compact('project'));
    }

    public function getProjects() {
        $projects = Project::get()->keyBy('id');
        $user = Auth::user();
        $allUsers = User::all();
        foreach($projects as $project)
        {
            if($user->favorites()->where('project_id', $project->id)->exists())
            {
                $project->is_favorite = true;
            }
            else
                $project->is_favorite = false;

            if($user->bids()->where('project_id', $project->id)->exists())
            {
                $project->is_bid = true;
            }
            else
                $project->is_bid = false;

            foreach($allUsers as $allUser)
                if($project->ownerID == $allUser->id)
                    $project->ownerName = $allUser->username;
        }


        return view('project')->with(compact('projects', 'favorites'))->with(compact('projects', 'bids'));
    }

    public function updateProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        // gets the id from a hidden input
        $project = Project::find($request->input('id'));
        if(Auth::user()->id != $project->ownerID) {
            return redirect()->back()->withErrors("You do NOT have permission to edit this project.");
        }
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->status = $request->input('status');
        $project->people_needed = $request->input('people_needed');
        $project->skills = $request->input('skills');
        $project->category = $request->input('category');
        // could change ownerID future functionality
        //$project->ownerID = Auth::user()->id;
        $project->save();

        return redirect()->action('Dashboard\DashboardController@getSponsorDashboard');

    }

    public function updateFavorite($id)
    {
        $project = Project::find($id);
        $user = Auth::user();
        if($user->favorites()->where('project_id', $id)->exists())
        {
            $user->favorites()->detach($id);
        }
        else
        {
            $user->favorites()->attach($id);
        }

        return redirect()->action('Project\ProjectController@putProject');
    }
    public function updateBid($id)
    {
        $user = Auth::user();
        if($user->bids()->where('project_id', $id)->exists())
        {
            $user->bids()->detach($id);
        }
        else
        {
            $user->bids()->attach($id);
        }

        return redirect()->action('Project\ProjectController@putProject');
    }


    public function putBids($project_id, $user_id)
    {
        $user = User::find($user_id);
        if($user->projectsAssigned()->where('project_id', $project_id)->exists())
        {
            $user->projectsAssigned()->detach($project_id);
        }
        else
        {
            $user->projectsAssigned()->attach($project_id);
        }

        return redirect()->back();
    }

    public function sortby_name(Request $request)
    {
        $projects = Project::get()->sortBy('name');
        $allUsers = User::all();
        foreach($projects as $project)
        {
            foreach($allUsers as $allUser)
                if($project->ownerID == $allUser->id)
                    $project->ownerName = $allUser->username;
        }

        return view('project')->with(compact('projects'));

    }

    public function sortby_date(Request $request)
    {
        $projects = Project::get()->sortBy('created_at');
        $allUsers = User::all();
        foreach($projects as $project)
        {
            foreach($allUsers as $allUser)
                if($project->ownerID == $allUser->id)
                    $project->ownerName = $allUser->username;
        }

        return view('project')->with(compact('projects'));
    }

    public function sortby_status(Request $request)
    {
        $projects = Project::get()->sortBy('status');
        $allUsers = User::all();
        foreach($projects as $project)
        {
            foreach($allUsers as $allUser)
                if($project->ownerID == $allUser->id)
                    $project->ownerName = $allUser->username;
        }

        return view('project')->with(compact('projects'));
    }
}