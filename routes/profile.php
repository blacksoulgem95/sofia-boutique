<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, '__invoke'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'updateProfile']);
    Route::post('/profile/legal', [ProfileController::class, 'updateLegal']);
});
