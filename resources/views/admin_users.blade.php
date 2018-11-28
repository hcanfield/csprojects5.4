@extends('admin_template')
@section('admin_content')
    <div class="content">
        <div class="title m-b-md">
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Reset</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($users as $user)
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->username}}</td>
                    <td>@if($user->password != "")<a href="{{ url('/admin/user/'.$user->id.'/reset/password') }}" class="btn btn-primary">Reset Password</a>@endif</td>

            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection