<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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
Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get( '/', [PostController::class, 'index'] ) -> name( 'index' );                         // 初期画面
    Route::get( '/posts/create', [PostController::class, 'create'] ) -> name( 'create' );           // 作成画面
    Route::get( '/posts/{post}', [PostController::class, 'show'] ) -> name( 'show' );               // 詳細画面
    Route::get( '/posts/{post}/edit', [PostController::class, 'edit'] ) -> name( 'edit' );          // 編集画面
    Route::post( '/posts', [PostController::class, 'store'] ) -> name( 'store' );                   // 作成実行
    Route::put( '/posts/{post}', [PostController::class, 'update'] ) -> name( 'update' );           // 編集実行
    Route::delete( '/posts/{post}', [PostController::class, 'delete'] ) -> name( 'delete' );        // 削除実行
    Route::get('/categories/{category}', [CategoryController::class,'index']) -> name( 'category' );   // カテゴリー一覧画面
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
