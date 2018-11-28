<!-- This displays the cumulative list of all projects -->
@extends('template')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            Projects
        </div>

        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sort By
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" value="Date" href="{{ url('/project/sort/date') }}">Date Added</a>
                <a class="dropdown-item" value="Project" href="{{ url('/project/sort/name') }}">Project Name</a>
                <a class="dropdown-item" value="Status" href="{{ url('/project/sort/status') }}">Status</a>
            </div>
        </div>
        <br>

        <div class="container">
            <div class="row">

                @foreach($projects as $project)
                    @if($project->status != "Not Published" and $project->status != "Archived")
                        <div class="col-12 col-md-4">
                        <div class="card text-center">
                            <div class="card-header">
                                {{$project->name}}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Status: {{$project->status}}</h5>
                                <p class="card-text">Description: {{$project->description}}</p>
                                <p class="card-text">Skills Needed: {{$project->skills}}</p>
                                # of People Needed: {{$project->people_needed}}
                                <br>
                                Category: {{$project->category}}
                                <br>
                                Project Owner: {{$project->ownerName}}
                                <br>
                                Date Added: {{$project->created_at->toDateString()}}
                            </div>
                            @if(Auth::user()->roleID == 1)
                                <div class="card-footer text-muted">
                                    <a href="{{ url('/project/'.$project->id.'/bid') }}" class="btn btn-primary">{{$project->is_bid == true ? 'Remove from Bids' : 'Bid on Project'}}</a>
                                    <a href="{{ url('/project/'.$project->id.'/favorite') }}" class="btn btn-primary">{{ $project->is_favorite == true ?  'Remove from Favorites' : 'Add to Favorites'}}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection