<!DOCTYPE html>
<x-app-layout>
    
    <x-slot name="header">
            Blog Name
    </x-slot>
    
    <div class='username'>
        ---------------------------------<br>
        === {{ Auth::user()->name }} のユーザー情報 ===<br>
        {{ Auth::user() }}<br>
        ---------------------------------<br>
    </div>
    
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
</x-app-layout>
<!-- 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
</html>
--!>
