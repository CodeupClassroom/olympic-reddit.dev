@extends('layouts.master')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h1>{{ $student->first_name }}</h1>
        <p> {{ $student->school_name }}</p>
        <p> {{ $student->description }}</p>
    </div>
    
@stop