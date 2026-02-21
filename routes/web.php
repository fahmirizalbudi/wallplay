<?php

use App\Http\Controllers\WallpaperController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WallpaperController::class, 'index'])->name('home');
Route::get('/trending', [WallpaperController::class, 'trending'])->name('wallpapers.trending');
Route::get('/categories', [WallpaperController::class, 'categories'])->name('wallpapers.categories');
Route::get('/category/{category}', [WallpaperController::class, 'category'])->name('wallpapers.category');

Route::resource('wallpapers', WallpaperController::class);

