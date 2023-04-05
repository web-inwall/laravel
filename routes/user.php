<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\DonateController;

// Route::prefix('user')->middleware('auth', 'active')->group(function () {
Route::prefix('user')->group(function () {
    Route::redirect('/', '/user/posts')->name('user');

    Route::get('posts', [PostController::class, 'index'])->name('user.posts'); //просмотр всех постов
    Route::get('posts/create', [PostController::class, 'create'])->name('user.posts.create'); //форма для добавления поста
    Route::post('posts', [PostController::class, 'store'])->name('user.posts.store'); //добавление поста
    Route::get('posts/{post}', [PostController::class, 'show'])->name('user.posts.show')->whereNumber('post'); //просмотр одного поста
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('user.posts.edit')->whereNumber('post'); // форма редактирования имеющегося поста
    Route::put('posts/{post}', [PostController::class, 'update'])->name('user.posts.update')->whereNumber('post'); // изменение имеющегося поста
    Route::delete('posts/{post}', [PostController::class, 'delete'])->name('user.posts.delete')->whereNumber('post'); //удаление поста

    Route::get('donates', DonateController::class)->name('user.donates');
});
