<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// List posts
Route::get('/posts',[App\Http\Controllers\PostsController::class, 'index'])->name('fetch_data');

// Display a single post
Route::get('/posts/{id}',[App\Http\Controllers\PostsController::class, 'show'])->name('show');

// Bookmark a post
Route::post('/posts/{id}/bookmark', [PostsController::class, 'bookmarkPost'])->name('bookmark');

// View bookmarks
Route::get('/bookmarks', [PostsController::class, 'viewBookmarks'])->name('bookmarks_view');






















