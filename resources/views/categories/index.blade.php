<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    <x-app-layout>
        
        <x-slot name="header">
            　Blog
        </x-slot>
        
       <h1>Blog Name</h1>
        
        <!-- ブログ投稿画面のリンク挿入 -->
        <a href="/posts/create">[ create ]</a>
        
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <!-- タイトルに詳細リンクを挿入 -->
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    
                    <!-- カテゴリのリンクを挿入 -->
                    <a href='/categories/{{ $post->category->id }}'>{{ $post->category->name }}</a>
                    
                    <!-- bodyを表示 -->
                    <p class='body'>{{ $post->body }}</p>
                    <form action='/posts/{{ $post->id }}' id='form_{{ $post->id }}' method='post'>
                        @csrf
                        @method('DELETE')
                        <button type='button' onclick='deletePost({{ $post->id }})'>delete</button>
                    </form>
                </div>
            @endforeach
        </div>
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        
        <script>
            function deletePost(id)
            {
                'use strict'
                
                if (confirm('削除すると復元できません。\n本当に削除しますか？'))
                {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </x-app-layout>
</html>
