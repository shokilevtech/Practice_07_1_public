<?php


namespace App\Http\Controllers;

//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    
    public function index (Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view ('posts/index') -> with ( ['posts' => $post->getPaginateByLimit()] );
        //blade内で使う変数'posts'と設定。
        //'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    
    // 特定IDのpostを表示する
    public function show( Post  $post )
    {
        return view( 'posts/show' ) -> with([ 'post' => $post ]);
        // 'post'はbladeファイルで使う変数。$postの中身はid=1のPostインスタンス。
    }
    
    // ブログ投稿作成画面表示用のコントローラー実装
    public function create()
    {
        return view( 'posts/create' );
    }
    
    // ブログ投稿作成処理用のコントローラー実装
    public function store( Post $post, PostRequest $request )
    {
        // サーバーに送られたかどうかチェックする→dd( $request->all() );
        $input = $request[ 'post' ];
        $post -> fill( $input ) -> save();
        return redirect( '/posts/' . $post -> id );
    }
    
    // ブログ投稿編集画面表示用コントローラー
    public function edit( Post $post )
    {
        return view( 'posts/edit' ) -> with( ['post' => $post] );
    }
    
    // ブログ編集内容で更新する
    public function update( PostRequest $request, Post $post )
    {
        // サーバーに送られたかどうかチェックする→dd( $request->all() );
        $input_post = $request[ 'post' ];
        $post -> fill( $input_post ) -> save();
        return redirect( '/posts/' . $post -> id );
    }
    
    // 削除処理
    public function delete( Post $post )
    {
        $post -> delete();
        return redirect('/');
    }
}
?>

