@extends('template')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            Login
        </div>
        <form action="{{ url('/login') }}" method="POST" id="login">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" form="login" value="Submit">Login</button>
        </form>
        <a href="{{url('/register')}}">Don't have an account? Register Here.</a>
    </div>
@endsection