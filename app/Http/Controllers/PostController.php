<?php


namespace App\Http\Controllers;

//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    
    public function index (Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view ('posts/index') -> with ( ['posts' => $post->getPaginateByLimit()] );
        //blade内で使う変数'posts'と設定。
        //'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    /**
    * 特定IDのpostを表示する
    *
    * @params Object Post // 引数の$postはid=1のPostインスタンス
    * @return Reposnse post view
    */
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
    
}
?>

