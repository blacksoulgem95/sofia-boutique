<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->middleware('role:ADMIN')->group(function () {
    Route::get('/admin', fn() => view('admin.dashboard'))->name('admin.dashboard');
});
