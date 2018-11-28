<!-- This is for editing a specific project -->
@extends('template')
@section('content')
        <div class="content">
            <div class="title m-b-md">
                {{$project->name}}
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Edit Project Details</h3>
                        <form action="{{ url('/project/edit') }}" method="POST" id="editProject">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $project->id }}">
                            <input type="hidden" name="_method" value="POST">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div>
                                        <label for="name">Project Name:</label>
                                        <input class="form-control" type="text" id="name" name="name" value="{{ $project->name }}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div>
                                        <label for="status">Status:</label>
                                        <select class="form-control" name="status">
                                            <option value="Available" {{ $project->status == "Available" ? "selected" : ""}}>Available</option>
                                            <option value="In Progress" {{ $project->status == "In Progress" ? "selected" : ""}}>In Progress</option>
                                            <option value="Completed" {{ $project->status == "Completed" ? "selected" : ""}}>Completed</option>
                                            <option value="Not Published" {{ $project->status == "Not Published" ? "selected" : ""}}>Not Published</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <br>
                                <textarea type="textarea" class="form-control" id="description" name="description" rows="5" cols="30">{{ $project->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="skills">Skills Needed:</label>
                                <br>
                                <textarea type="textarea" class="form-control" id="skills" name="skills" rows="5" cols="30">{{$project->skills}}</textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="people_needed">People Needed:</label>
                                    <input type="number"class="form-control"  min="1" step="1" id="people_needed" name="people_needed" value="{{$project->people_needed}}">
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="category">Category:</label>
                                    <select class="form-control" name="category">
                                        <option value="Web Development" {{ $project->category == "Web Development" ? "selected" : ""}}>Web Development</option>
                                        <option value="Mobile App Development" {{ $project->category == "Mobile App Development" ? "selected" : ""}}>Mobile App Development</option>
                                        <option value="Artificial Intelligence" {{ $project->category == "Artificial Intelligence" ? "selected" : ""}}>Artificial Intelligence</option>
                                        <option value="Network Security" {{ $project->category == "Network Security" ? "selected" : ""}}>Network Security</option>
                                        <option value="Cryptography" {{ $project->category == "Cryptography " ? "selected" : ""}}>Cryptography</option>
                                        <option value="Virtual Reality" {{ $project->category == "Virtual Reality " ? "selected" : ""}}>Virtual Reality</option>
                                        <option value="Machine Learning" {{ $project->category == "Machine Learning" ? "selected" : ""}}>Machine Learning</option>
                                        <option value="Other" {{ $project->category == "Other" ? "selected" : ""}}>Other</option>
                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit" form="editProject" value="Submit">Update</button>
                        </form>
                    </div>
                    @if(Auth::user()->roleID == 2)
                        <div class="col">
                            <h3>Project Bidders</h3>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Assignment Status</th>
                                        <th scope="col">Student Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($project->bids as $bid)
                                        <td>
                                                @if($project->assigned->contains($bid->id))
                                                    <a href="{{url('/project/'.$project->id.'/user/'.$bid->id)}}"><i style="padding:0 10px 0 0;" class="fas fa-check fa-lg"></i>Assigned</a>
                                                @else
                                                    <a href="{{url('/project/'.$project->id.'/user/'.$bid->id)}}"><i style="padding:0 10px 0 0;" class="fas fa-times fa-lg"></i>Unassigned</a>
                                                @endif

                                        </td>
                                        <td>
                                            <a href="{{url('/user/'.$bid->username)}}"><i style="padding:0 10px 0 0;"class="fas fa-user fa-lg"></i>
                                                {{ $bid->username }}
                                            </a>
                                        </td>
                                    @endforeach
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
    </div>
@endsection