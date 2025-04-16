<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = Post::all();
    return view('app', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'user_register']);
Route::post('/login', [UserController::class, 'user_login']);
Route::post('/logout', [UserController::class, 'user_logout']);
Route::post('/create-post', [PostController::class, 'create_post']);
