@extends('template')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            Register
        </div>
        <form action="{{ url('/register') }}" method="POST" id="register">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" form="register" value="Submit">Register</button>
        </form>
    </div>
@endsection