@extends('admin_template')
@section('admin_content')
    <div class="content">
        <div class="title m-b-md">
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Archive</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($projects as $project)
                    @if($project->status != "Archived")
                        <th scope="row">{{$project->id}}</th>
                        <td>{{$project->name}}</td>
                        <td>{{$project->status}}</td>
                        <td><a href="{{ url('/admin/project/'.$project->id.'/archive') }}" class="btn btn-primary">Archive Project</a></td>
                    @endif
            </tr>
            @endforeach

            </tbody>
        </table>
        <h2>Archived</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($projects as $project)
                    @if($project->status == "Archived")
                        <th scope="row">{{$project->id}}</th>
                        <td>{{$project->name}}</td>
                    @endif
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection