@extends('template')
@section('content')
    <div class="content">
        <div class="title m-b-md"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row justify-content-center">
                        <div class="profile-header-container">
                            @if($user->avatar != "")
                                <div class="profile-header-img">
                                    <img class="rounded mx-auto d-block" style="margin: 70px 0 0 0; width:75%; height:75%;" src="/storage/avatars/{{ $user->avatar }}" />
                                </div>
                            @else
                                <i style="margin:20px 0px 5px 0;" class="far fa-smile-beam fa-5x"></i>
                            @endif
                        </div>
                    </div>
                    @if($user->id == Auth::user()->id)
                        <h5 style="margin:20px; text-align:center;"><a href='/editProfile'>Edit Profile</a></h5>
                    @endif
                </div>

                <div class="col-md-7 offset-md-1" style="font-size:150%">
                    <h2 style="margin: 30px 0 10px 0">{{$user->firstName}} {{$user->lastName}}</h2>
                    <table class="table table-borderless">

                        <tbody>
                            @if($user->roleID == 1)
                                <tr>
                                    <td>Role:</td>
                                    <td>Student</td>
                                </tr>
                                <tr>
                                    <td>Languages:</td>
                                    <td>{{$user->languages}}</td>
                                </tr>
                                <tr>
                                    <td>Skills:</td>
                                    <td>{{$user->skills}}</td>
                                </tr>
                                <tr>
                                    <td>Website:</td>
                                    <td>{{$user->web_link}}</td>
                                </tr>
                                <tr>
                                    <td>Resume:</td>
                                    <td><a href="/storage/resumes/{{$user->resume}}" target="_blank">View Resume</a></td>
                                </tr>
                            @elseif($user->roleID == 2)
                                <tr>
                                    <td>Role:</td>
                                    <td>Faculty</td>
                                </tr>
                                <tr>
                                    <td>Research Area:</td>
                                    <td>{{$user->research_area}}</td>
                                </tr>
                                <tr>
                                    <td>Link:</td>
                                    <td>{{$user->web_link}}</td>
                                </tr>
                            @else
                                <tr>
                                    <td>Role:</td>
                                    <td>Sponsor</td>
                                </tr>
                                <tr>
                                    <td>Link:</td>
                                    <td>{{$user->web_link}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection