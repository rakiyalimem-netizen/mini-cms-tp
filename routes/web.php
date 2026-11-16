<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');
Route::get('/heure', [PageController::class, 'time'])->name('time');

Route::resource('posts', PostController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update']);