@extends('template')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            Hi {{Auth::user()->firstName}}! Update your profile here.
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4">

                        <div class="row justify-content-center">
                            <div class="profile-header-container">
                                @if($user->avatar != "")
                                <div class="profile-header-img">
                                    <img class="rounded mx-auto d-block" style="width:50%; height:50%; margin: 20px 0 5px 0;" src="/storage/avatars/{{ $user->avatar }}" />
                                    <!-- badge -->
                                </div>
                                @else
                                    <i style="margin:20px 0px 5px 0;" class="far fa-smile-beam fa-5x"></i>
                                @endif
                            </div>
                        </div>
                    <div class="row justify-content-center">
                        <form action="{{ url('/avatar') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input class="btn btn-primary" type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                            </div>
                            <button class="btn btn-primary" style="margin: 0 0 20px 0;" type="submit">Update Picture</button>
                        </form>
                    </div>
                    <div class="row justify-content-center">
                        <a href="/storage/resumes/{{$user->resume}}" target="_blank"><i style="margin:30px 0 5px 0;" class="far fa-file-alt fa-5x"></i></a>
                        <form action="{{ url('/user/'.$user->id.'/resume') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input class="btn btn-primary" type="file" class="form-control-file" name="resume" id="resumeFile" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                            </div>
                            <button class="btn btn-primary" type="submit">Update Resume</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 ml-auto">
                    <form action="{{ url('/user')}}" method="POST" style="margin:20px" id="editProfile" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstName">First Name:</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $user->firstName }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Last Name:</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $user->lastName }}">
                            </div>
                        </div>
                        @if(Auth::user()->roleID == 1)
                            <div class="form-group">
                                <label for="languages">Languages:</label>
                                <br>
                                <textarea type="textarea" class="form-control" id="languages" name="languages" rows="5" cols="30">{{ $user->languages }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="skills">Skills:</label>
                                <br>
                                <textarea type="textarea" class="form-control" id="skills" name="skills" rows="5" cols="30">{{ $user->skills }}</textarea>
                            </div>
                        @else
                            <div class="form-group">
                                <label for="research_area">Research Area:</label>
                                <br>
                                <textarea type="textarea" class="form-control"  id="research_area" name="research_area" rows="5" cols="30">{{ $user->research_area }}</textarea>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="web_link">Link:</label>
                            <input type="text" id="web_link" class="form-control" name="web_link" value="{{ $user->web_link }}">
                        </div>
                        <button type="submit" class="btn btn-primary" form="editProfile" value="Submit">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection