@extends('layouts.main')

@section('content')

    @include('error')

    {{ Form::open(['route' => 'posts.store', 'files' => true]) }}
    @include('post.form')
    {{ Form::submit('Create') }}
    {{ Form::close() }}

@endsection
