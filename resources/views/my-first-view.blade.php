@extends('layouts.another')

@section('footer')
    <p>Copyright 2017</p>
@stop

@section('content')

    @if ($name !== 'World')
        <h1>Hello, {{ $name }}!</h1>
    @else
        <p>You must have a name, right?</p>
    @endif

    <p>More content here!!</p>
@stop
