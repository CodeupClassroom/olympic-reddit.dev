@extends('layouts.master')

@section('content')
    <section class="col-md-6 col-md-offset-3">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->url }}</p>
        <p>{{ $post->content }}</p>
        <p><a href="{{ action('PostsController@edit', $post->id) }}">Click here to edit this post</a></p>

    </section>
@stop