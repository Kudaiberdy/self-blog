@extends('layouts.main')

@section('content')

    @include('error')

    {{ Form::model($category, ['url' => route('post_categories.update', $category), 'method' => 'PATCH']) }}
    @include('post_category.form')
    {{ Form::submit('Update') }}
    {{ Form::close() }}

@endsection
