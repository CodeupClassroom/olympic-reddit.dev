@extends('layouts.master')

@section('content')
    <h1>{{ $student->first_name }}</h1>
    <p>{{ $student->school_name }}</p>
@stop