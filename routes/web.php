<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\RegisterController;

// Route::get('/', [PostController::class, 'index']);

// Route::get('welcome/{lang}', function($lang) {
//     if($lang == 'en') {
//         return "English";
//     }
//     if($lang == 'my') {
//         return "Myanmar";
//     }
// })->where('lang', 'en|my');
// Route::view('welcomexxx', 'welcome');

Route::redirect('/', '/posts');

// Route::prefix('posts')->middleware('myauth')->group(function() {
//     Route::get('/', [PostController::class, 'index'])->name('post.index');
//     Route::get('/create', [PostController::class, 'create']);
//     Route::post('', [PostController::class, 'store']);
//     Route::get('/{id}/edit', [PostController::class, 'edit']);
//     Route::put('/{id}', [PostController::class, 'update']);
//     Route::patch('/{id}', [PostController::class, 'update']);
//     Route::get('/{id}', [PostController::class, 'show']);
//     Route::delete('/{id}', [PostController::class, 'destroy']);
// });

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('myauth');
Route::post('/posts', [PostController::class, 'store'])->middleware('myauth');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->middleware('myauth');
Route::put('/posts/{id}', [PostController::class, 'update'])->middleware('myauth');
Route::patch('/posts/{id}', [PostController::class, 'update']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('myauth');

// Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
// Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
// Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
// Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::resource('category', CategoryController::class);

// Route::resource('posts', PostController::class);

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::get('logout', [LoginController::class, 'destroy']);

Route::get('my-posts', [MyPostController::class, 'index']);

Route::middleware('auth')->group(function() {
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('change-password', [ChangePasswordController::class, 'edit'])->name('change_password.edit');
    Route::post('change-password', [ChangePasswordController::class, 'update'])->name('change_password.update');
});
