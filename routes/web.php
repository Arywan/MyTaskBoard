<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Display the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Display the dashboard page (requires authentication and email verification)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grouped routes that require authentication
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Task routes (CRUD operations for tasks)
    Route::resource('tasks', TaskController::class);
});

// Include authentication routes
require __DIR__.'/auth.php';
