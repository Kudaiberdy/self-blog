@extends('layouts.main')

@section('content')

    @include('flash')

    <h1>{{ $category->name }}</h1>
    <div>{{ $category->description }}</div>

    <div>
        <a href="{{ route('post_categories.edit', $category->id) }}">
            Edit
        </a>
    </div>

    @if ($category->posts->isNotEmpty())
        <h2>Posts</h2>
        <div>
            <ol>
                @foreach ($category->posts as $post)
                    <li>
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    </li>
                @endforeach
            </ol>
        </div>
    @endif

@endsection
