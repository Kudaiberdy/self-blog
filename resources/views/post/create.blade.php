@extends('layouts.main')

@section('content')

    @include('error')

    {{ Form::model($post, ['route' => 'posts.store']) }}
    @include('post.form')
    {{ Form::submit('Create') }}
    {{ Form::close() }}

@endsection
