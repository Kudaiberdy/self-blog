@extends('layouts.main')

@section('content')

    @include('flash')
    @include('error')

    {{ Form::model($post, ['url' => route('posts.update', $post->id), 'method' => 'PATCH']) }}
    @include('post.form')
    {{ Form::submit('Update') }}
    {{ Form::close() }}

@endsection
