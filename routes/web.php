<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('posts', [PostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('posts');

Route::get('posts/create', [PostController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('create-post');


Route::get('posts/{id}', [PostController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('get-post');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
