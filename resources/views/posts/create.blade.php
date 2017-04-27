@extends('layouts.master')

@section('content')
    <form action="{{ action('PostsController@store') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
            @if ($errors->has('title'))
                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
            @endif
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" id="url" name="url" value="{{ old('url') }}" class="form-control">
            @if ($errors->has('url'))
                <div class="alert alert-warning" role="alert">
                    {{ $errors->first('url') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
            @if ($errors->has('content'))
                <div class="alert alert-warning" role="alert">
                    {{ $errors->first('content') }}
                </div>
            @endif
        </div>
        <input type="submit" value="Save" class="btn btn-primary">
    </form>
@stop
