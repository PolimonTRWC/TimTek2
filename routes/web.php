<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameRecordController;



//admins
Route::resource('games', GameController::class)->middleware('can:manage-games');

//lietotajs
Route::middleware(['auth'])->group(function () {
    Route::resource('records', GameRecordController::class);
});


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
    Route::get('/my-games', [GameRecordController::class, 'myGames'])->name('records.my_games');
});
Route::get('/my-games', [GameRecordController::class, 'myGames'])->name('records.my_games');


require __DIR__.'/auth.php';
