<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.delete');
});

Route::get('/managers/create', [ManagerController::class, 'create'])->name('managers.create');
Route::post('/managers/store', [ManagerController::class, 'store'])->name('managers.store');

Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostsController::class, 'store'])->name('posts.store');



require __DIR__.'/auth.php';
