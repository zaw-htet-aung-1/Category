<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/posts/create', [PostController::class, 'create']);
// Route::post('/posts', [PostController::class, 'store']);
// Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
// Route::put('/posts/{id}', [PostController::class, 'update']);
// Route::patch('/posts/{id}', [PostController::class, 'update']);
// Route::get('/posts/{id}', [PostController::class, 'show']);
// Route::delete('/posts/{id}', [PostController::class, 'destroy']);

Route::resource('posts', PostController::class);
