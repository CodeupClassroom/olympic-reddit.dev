@extends('layouts.master')

@section('content')
    @foreach($posts as $post)
        <article class="col-md-4">
            <h3>{{ $post->title }}</h3>
        </article>
    @endforeach
@stop