@extends('layouts.main')

@section('content')

    @include('error')

    {{ Form::model($post, ['url' => route('posts.update', $post), 'method' => 'PATCH']) }}
    @include('post.form')
    {{ Form::submit('Update') }}
    {{ Form::close() }}

@endsection
