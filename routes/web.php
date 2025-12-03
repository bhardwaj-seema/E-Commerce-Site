<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

// Public page
Route::view('/', 'welcome');

// User dashboard (normal users)
Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// User profile
Route::view('/profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


// ==========================
// Admin Routes
// ==========================
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::view('dashboard', 'admin.dashboard')->name('dashboard');
    Route::resource('products',ProductController::class);
    Route::resource('categories',CategoryController::class);



        // Add more admin routes here...
    });


// Breeze auth routes
require __DIR__.'/auth.php';
