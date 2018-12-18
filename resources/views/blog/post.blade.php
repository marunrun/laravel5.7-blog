<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('blog.title') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <h5>{{ $post->pulished_at }}</h5>
        <hr>
        {!! $post->content !!}
        <hr>
        <button class="btn btn-primary" onclick="history.go(-1)">
            << Back
        </button>
    </div>
</body>
</html>