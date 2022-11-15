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
        
        <h1>Blog Name</h1>
        
        <!-- ブログ投稿画面のリンク挿入 -->
        <a href="/posts/create">create</a>
        
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <!-- タイトルに詳細リンクを挿入 -->
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <!-- bodyを表示 -->
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        
        
        
    </body>
</html>


