<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; //外部にあるPostControllerクラスをインポート

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get( '/', [PostController::class, 'index'] );                    // 初期画面
Route::get( '/posts/create', [PostController::class, 'create'] );       // 作成画面
Route::get( '/posts/{post}', [PostController::class, 'show'] );         // 詳細画面
Route::get( '/posts/{post}/edit', [PostController::class, 'edit'] );    // 編集画面
Route::post( '/posts', [PostController::class, 'store'] );              // 作成実行
Route::put( '/posts/{post}', [PostController::class, 'update'] );       // 編集実行
Route::delete( '/posts/{post}', [PostController::class, 'delete'] );    // 削除実行