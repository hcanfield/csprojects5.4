@extends('template')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            @if(Auth::user()->firstName === '')
                My Student Dashboard
            @else
                {{Auth::user()->firstName}}'s Dashboard
            @endif
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div><p>My Current Projects</p></div>
                    @foreach($assigned as $assign)
                        <div class="container">
                            <div class="card-columns">
                                <div class="card text-center">
                                    <div class="card-header">
                                        {{$assign->name}}
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Description: {{$assign->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-sm">
                    <div><p>My Bids</p></div>
                    @foreach($bids as $bid)
                        <div class="container">
                            <div class="card-columns">
                                <div class="card text-center">
                                    <div class="card-header">
                                        {{$bid->name}}
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Status: {{$bid->status}}</h5>
                                        <p class="card-text">Description: {{$bid->description}}</p>
                                        <p class="card-text">Skills Needed:{{$bid->skills}}</p>
                                        # of People Needed: {{$bid->people_needed}}
                                        <br>
                                        Category: {{$bid->category}}
                                        <br>
                                        Project Owner: {{$bid->ownerName}}
                                        <br>
                                        Date Added: {{$bid->created_at->toDateString()}}
                                    </div>
                                    <div class="card-footer text-muted">
                                        <a href="{{ url('/project/'.$bid->id.'/bid') }}" class="btn btn-primary">Remove from Bids</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-sm">
                <div><p>My Favorites</p></div>
                @foreach($favorites as $favorite)
                    <div class="container">
                        <div class="card-columns">
                            <div class="card text-center">
                                <div class="card-header">
                                    {{$favorite->name}}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Status: {{$favorite->status}}</h5>
                                    <p class="card-text">Description: {{$favorite->description}}</p>
                                    <p class="card-text">Skills Needed:{{$favorite->skills}}</p>
                                    # of People Needed: {{$favorite->people_needed}}
                                    <br>
                                    Category: {{$favorite->category}}
                                    <br>
                                    Project Owner: {{$favorite->ownerName}}
                                    <br>
                                    Date Added: {{$favorite->created_at->toDateString()}}
                                </div>
                                <div class="card-footer text-muted">
                                    <a href="{{ url('/project/'.$favorite->id.'/favorite') }}" class="btn btn-primary">Remove from Favorites</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection