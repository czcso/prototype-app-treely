<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = Post::all();
    //$posts = Post::where('user_id', auth()->guard('web')->id())->get();
    //$posts = auth()->guard('web')->user()->user_posts()->latest()->get();
    return view('app', ['posts' => $posts]);
});

// User session related routes
Route::post('/register', [UserController::class, 'user_register']);
Route::post('/login', [UserController::class, 'user_login']);
Route::post('/logout', [UserController::class, 'user_logout']);

// Blog post related routes
Route::post('/create-post', [PostController::class, 'create_post']);
Route::get('/edit-post/{post}', [PostController::class, 'show_edit_screen']);
Route::put('/edit-post/{post}', [PostController::class, 'actually_update_post']);
Route::delete('/edit-post/{post}', [PostController::class, 'delete_post']);
