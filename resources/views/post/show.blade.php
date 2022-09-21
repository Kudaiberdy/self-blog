@extends('layouts.main')

@section('content')

    @include('flash')

    <h1>{{ $post->title }}</h1>
    <small>
        Post category:
        <a href="{{ route('post_categories.show', $post->category->id) }}">
            {{ $post->category->name }}
        </a>
    </small>
    <div>{{ $post->content }}</div>

    <div>
        <a href="{{ route('posts.edit', $post->id) }}">
            Edit
        </a>
    </div>
    <div>
        <a href="{{ route('posts.destroy', $post) }}"
           data-confirm='Are you sure?'
           data-method="delete"
           rel="nofollow">Delete</a>
    </div>

@endsection
