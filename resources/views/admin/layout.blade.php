<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" conten="{{ csrf_token() }}">
    <title>{{ config('blog.title') }} 管理后台</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>
<body>
{{-- Navigation Bar --}}
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a href="#" class="navbar-brand mr-auto mr-lg-0">{{ config('blog.title') }} 后台</a>
        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#navbar-menu"
                aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navar-menu">
            @include('admin.partials.navbar')
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>
<script src="{{ asset('js/app.js') }}"></script>

@yield('script')
</body>
</html>