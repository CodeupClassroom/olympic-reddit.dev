@extends('layouts.master')

@section('content')
    <h1>Edit a student information</h1>

    <form action="{{ action('StudentsController@update') }}" method="post">
        @include('partials.students-form')
        <input type="submit" class="btn btn-default" value="Update student information">
        {{ method_field('PUT') }}
    </form>
@stop
