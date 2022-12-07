<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Posts</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    
    <body class='antialiased'>
        <p class='edit'>
            [ <a href='/posts/{{ $post->id }}/edit'>edit</a> ]
        </p>
        
        <h1 class="title">
            {{ $post->title }}
        </h1>
        
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>
            </div>
        </div>
        
        <a href='/categories/{{ $post->category->id }}'>{{ $post->category->name }}</a>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        
    </body>
</html>