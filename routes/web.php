<?php
declare(strict_types=1);
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PostController,
    PostCommentController,
    PostCategoryController
};

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);

Route::post('/posts/{id}/comments', [PostCommentController::class, 'store'])
    ->name('post_comment.create');

//Route::controller(PostsController::class)->group(function () {
//    Route::get('/posts', 'index')
//        ->name('posts.index');
//
//    Route::get('/posts/create', 'create')
//        ->name('posts.create');
//
//    Route::post('/posts', 'store')
//        ->name('posts.store');
//
//    Route::get('/posts/{id}/edit', 'edit')
//        ->name('posts.edit');
//
//    Route::patch('/posts/{id}', 'update')
//        ->name('posts.update');
//
//    Route::get('/posts/{id}', 'show')
//        ->name('posts.show');
//
//    Route::delete('posts/{id}', 'destroy')
//        ->name('posts.destroy');
//});


Route::resource('post_categories', PostCategoryController::class);

//Route::resource('post_comments', PostCommentController::class);
