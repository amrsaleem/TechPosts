<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('posts', PostController::class)->middleware('auth', ['except' => ['index','show']]);
Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'] )->name('posts.create');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'] )->name('posts.edit');
    Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
});

Route::get('/posts', [PostController::class, 'index'] )->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');


Route::post('/posts/{post_id}/comments',[CommentController::class, 'store'])->name('comments.store');
Route::delete('/posts/comments/{comment_id}',[CommentController::class, 'destroy'])->name('comments.destroy');




require __DIR__.'/auth.php';
