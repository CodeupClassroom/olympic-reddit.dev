@extends('layouts.master')

@section('content')
    @foreach(range($start, $end) as $number)
        <p>{{ $number }}</p>
    @endforeach
@stop
