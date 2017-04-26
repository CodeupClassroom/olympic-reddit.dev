@extends('layouts.master')

@section('content')
    <h1>Edit a student information</h1>

    <form action="{{ action('StudentsController@update', [23]) }}" method="post">
        @include('partials.students-form')
        <input type="submit" class="btn btn-default" value="Update student information">
        {{ method_field('PUT') }}
    </form>

    <form action="{{ action('StudentsController@destroy', [23]) }}" method="post">
        {!! csrf_field() !!}
        <input type="submit" value="Delete" class="btn btn-danger">
        {{ method_field('DELETE') }}
    </form>
@stop
