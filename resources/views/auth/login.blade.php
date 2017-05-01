@extends('layouts.master')
@section('content')
    <form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
        {!! csrf_field() !!}
        <div class="form-group">
            Email
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>
        <div class="form-group">
            Password
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="checkbox" name="remember"> Remember Me
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
@stop
