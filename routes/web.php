<?php

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

Route::get('/', \App\Livewire\Todos::class);
Route::get('/counter', \App\Livewire\Counter::class);
Route::get('/posts', \App\Livewire\Posts::class);
Route::get('/create-post', \App\Livewire\CreatePost::class);

Route::group([
    'middleware' => 'auth',
], static function () {
    Route::get('profile', \App\Livewire\EditProfile::class);
});

Route::get('signup', \App\Livewire\Signup::class)->name('signup');
Route::get('blog-posts', \App\Livewire\ShowPosts::class)->name('blog-posts');