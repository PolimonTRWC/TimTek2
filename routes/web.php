<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('games', GameController::class);
});

// Auth No Laravel breeze
require __DIR__.'/auth.php';
require __DIR__.'/profile.php';