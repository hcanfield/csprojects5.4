@extends('template')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            Sponsor Dashboard
        </div>

        <h4>Projects</h4>

        <div class="container">
            <div class="card-columns">
                @foreach($projects as $project)
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
                            Date Added: {{$project->created_at->toDateString()}}
                        </div>
                        <div class="card-footer text-muted">
                            <a href="{{ url('/project/'.$project->id.'/edit') }}" class="btn btn-primary">Edit Project</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection