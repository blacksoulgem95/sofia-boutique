<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->middleware('role:ADMIN')->group(function () {
    Route::get('/profile', [ProfileController::class, '__invoke'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'updateProfile']);
    Route::post('/profile/legal', [ProfileController::class, 'updateLegal']);
    Route::post('/profile/add_address', [ProfileController::class, 'addAddress']);
    Route::delete('/profile/address/{address_id}', [ProfileController::class, 'deleteAddress'])->name('profile.delete_address');
    Route::put('/profile/address/{address_id}/billing', [ProfileController::class, 'setAddressAsBilling'])->name('profile.set_billing');
});
