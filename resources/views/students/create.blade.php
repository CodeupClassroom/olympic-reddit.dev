@extends('layouts.master')

@section('content')
    <h1>Create a student</h1>

    <form action="{{ action('StudentsController@store') }}" method="post">
        @include('partials.students-form')
        <input type="submit" class="btn btn-default" value="Create student">
    </form>
@stop
