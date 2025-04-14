<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminCategoryController;

// Rota principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rotas existentes
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/categories/{category:slug}', [PostController::class, 'byCategory'])->name('posts.category');

Route::view('contact', 'contact')->name('contact');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::view('/second', 'second');

// Rotas do Painel Administrativo
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Gerenciamento de Posts
    Route::resource('posts', AdminPostController::class);
    
    // Gerenciamento de Categorias
    Route::resource('categories', AdminCategoryController::class);
});
