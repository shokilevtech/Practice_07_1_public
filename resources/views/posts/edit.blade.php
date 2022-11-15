<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Blog</title>
        
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    
    <body class='antialiased'>
        <h1 class='title'>編集画面</h1>
        
        <div class='content'>
            <form action='/posts/{{ $post->id }}' method='POST'>
                @csrf
                @method('PUT')
                
                <div class='content__title'>
                    <h2>タイトル</h2>
                    <input type='text' name='post[title]' placeholder="タイトル" value='{{ $post->title }}'>
                </div>
                
                <div class='content__body'>
                    <h2>本文</h2>
                    <input type='text' name='post[body]' placeholder="今日も1日お疲れさまでした。" value='{{ $post->body }}'>
                </div>
                <input type='submit' value='update'>
            </form>
        </div>
        
        <div class="footer">
            <a href="/posts/{{ $post->id }}">戻る</a>
        </div>
    </body>
</html>