@extends('template')
@section('content')
        <div class="content">
            <div class="title m-b-md">
                CS Project Portal
            </div>
            <p>A platform for students, faculty, and outside sponsors to collaborate on technical projects.</p>
            <p>Sign in with your K-State credentials or create an account.</p>
            @if(Auth::check())
                Welcome {{Auth::user()->username }}!
            @endif
        </div>
    </div>
@endsection
