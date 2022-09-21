@extends('layouts.main')

@section('content')

    @include('error')

    {{ Form::model($category, ['url' => route('post_categories.store')]) }}
    @include('post_category.form')
    {{ Form::submit('Create') }}
    {{ Form::close() }}

@endsection
