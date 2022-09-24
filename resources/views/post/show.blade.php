@extends('layouts.main')

@section('content')

    @include('flash')

{{--    <small>--}}
{{--        Post category:--}}
{{--        <a href="{{ route('post_categories.show', $post->category->id) }}">--}}
{{--            {{ $post->category->name }}--}}
{{--        </a>--}}
{{--    </small>--}}

{{--    <div>--}}
{{--        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <a href="{{ route('posts.destroy', $post) }}"--}}
{{--           data-confirm='Are you sure?'--}}
{{--           data-method="delete"--}}
{{--           rel="nofollow">Delete</a>--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        @foreach($comments as $comment)--}}
{{--            <div>{{ $category->body }}</div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--    {{ Form::model($post, ['url' => route('posts.update', $post->id), 'method' => 'POST']) }}--}}
{{--    @include('post_comment.form')--}}
{{--    {{ Form::submit('Comment') }}--}}
{{--    {{ Form::close() }}--}}




    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                Post category:
                <a href="{{ route('post_categories.show', $post->category->id) }}">
                    {{ $post->category->name }}
                </a>
            </p>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Created at {{ $post->created_at }}</p>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
            </p>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('posts.destroy', $post) }}"
                   data-confirm='Are you sure?'
                   data-method="delete"
                   rel="nofollow">Delete</a>
            </p>

            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset("$post->img_path") }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {{ $post->content }}
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-lg-9 mx-auto">

                    @foreach($comments as $comment)
                        <div>{{ $comment->body }}</div>
                        <div><img src="{{ asset($comment->img_path) }}" alt=""></div>
                        <div>{{ $comment->created_at }}</div>
                    @endforeach

                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a comment</h2>
                        {{ Form::open(['url' => route('post_comment.create', $post->id), 'files' => true]) }}
                        @include('post_comment.form')
                        {{ Form::submit('Comment', ['value' => 'Comment', 'class' => 'btn btn-warning']) }}
                        {{ Form::close() }}
                    </section>
                </div>
            </div>
        </div>
    </main>

@endsection



