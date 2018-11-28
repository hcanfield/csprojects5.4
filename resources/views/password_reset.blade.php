@extends('admin_template')
@section('admin_content')
    <div class="content">
        <div class="title m-b-md">
            Password Reset
        </div>

        <form action="{{ url('/admin/user/'.$user->id.'/reset/password') }}" method="POST" id="password_reset" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="POST">

            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="">
            </div>
            <div>
                <label for="confirmation">Password Confirmation:</label>
                <input type="password" id="confirmation" name="confirmation" value="">
            </div>

            <button type="submit" form="password_reset" value="Submit">Reset Password</button>
        </form>
    </div>
@endsection