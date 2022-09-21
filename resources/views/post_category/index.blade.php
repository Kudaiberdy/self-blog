@extends('layouts.main')

@section('content')

    @include('flash')


    <h1>List of post categories</h1>
    @foreach($categories as $category)
        <h2><a href="{{ route('post_categories.show', $category->id) }}">{{$category->name}}</a></h2>
        <div>{{$category->description}}</div>
    @endforeach
@endsection
