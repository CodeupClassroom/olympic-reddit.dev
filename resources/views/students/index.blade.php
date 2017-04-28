@extends('layouts.master')

@section('content')
    @foreach($students as $student)
        <div class="col-md-6">
            <h3>{{ $student->first_name }}</h3>
            <h4>School: {{ $student->school_name }}</h4>
            <p>Description: {{ $student->description }}</p>
            <p>Subscribed: {{ $student->subscribed }}</p>
        </div>
    @endforeach

    {!! $students->render() !!}


@stop