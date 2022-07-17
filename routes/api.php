<?php

use App\Http\Controllers\API\CategoryController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', function() {
    return Post::paginate(2);
});

Route::get('posts/{id}', function($id) {
    return Post::find($id);
});

// Route::get('category', [CategoryController::class, 'index']);
// Route::get('category/{id}', [CategoryController::class, 'show']);
// Route::post('category', [CategoryController::class, 'store']);
// Route::put('category/{id}', [CategoryController::class, 'update']);
// Route::delete('category/{id}', [CategoryController::class, 'destory']);

Route::apiResource('category', CategoryController::class);
