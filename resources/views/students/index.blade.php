@extends('layouts.master')

@section('content')
    <table class="table">
        <tr>
            <th>First name</th>
            <th>School name</th>
        </tr>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->school_name }}</td>
            </tr>
        @endforeach
    </table>
@stop
