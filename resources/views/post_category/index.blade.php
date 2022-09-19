@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">

                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="assets/images/blog_1.jpg" alt="blog post">
                        </div>
                        <p class="blog-post-category">{{ $category->name }}</p>
                        <a href="#!" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{ $category->descriprion }}</h6>
                        </a>
                    </div>
                    @endforeach
                </div>

            </section>
        </div>

    </main>
@endsection
