@extends('layouts.main')


@section('content')

    @include('flash')
    @include('error')

    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Posts</h1>
            <section class="featured-posts-section">

                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="assets/images/blog_1.jpg" alt="post category">
                        </div>
                        <p class="blog-post-category">{{ $post->category->name }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                        </a>
                    </div>
                    @endforeach
                </div>

            </section>
        </div>

    </main>
@endsection
