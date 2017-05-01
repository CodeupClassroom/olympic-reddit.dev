@extends('layouts.master')

@section('content')
    <form method="POST" action="{{ action('Auth\AuthController@postRegister') }}">
        {!! csrf_field() !!}
        <div class="form-group">
            Name
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            @if ($errors->has('name'))
                {{ $errors->first('name') }}
            @endif
        </div>
        <div class="form-group">
            Email
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
            @if ($errors->has('email'))
                {{ $errors->first('email') }}
            @endif
        </div>
        <div class="form-group">
            Password
            <input type="password" name="password" class="form-control">
            @if ($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
        </div>
        <div class="form-group">
            Confirm Password
            <input type="password" name="password_confirmation" class="form-control">
            @if ($errors->has('password_confirmation'))
                {{ $errors->first('password_confirmation') }}
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
@stop
