<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Self-blog</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/flag-icon-css/css/flag-icon.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/font-awesome/css/all.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/aos/aos.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    <script src="{{ asset("assets/vendors/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/js/loader.js") }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/posts" id="blogDropdown" aria-haspopup="true" aria-expanded="false">Posts</a>
                        <div class="dropdown-menu" aria-labelledby="blogDropdown">
                            <a class="dropdown-item" href="/posts/create">Create post</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/post_categories" id="blogDropdown" aria-haspopup="true" aria-expanded="false">Posts categories</a>
                        <div class="dropdown-menu" aria-labelledby="blogDropdown">
                            <a class="dropdown-item" href="/post_categories/create">Create category</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

@yield('content')


<script src="{{ asset("assets/vendors/popper.js/popper.min.js") }}"></script>
<script src="{{ asset("assets/vendors/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("assets/vendors/aos/aos.js") }}"></script>
<script src="{{ asset("assets/js/main.js") }}"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>
</body>

</html>
