<?php

use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\Main\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'isUserBan'])->group(function(){

    Route::prefix('profile')->controller(ProfileController::class)->group(function() {

        Route::get('/{user}', 'show')->name('profiles.show');

        Route::get('/{user}/edit', 'edit')->name('profiles.edit');

        Route::post('/{user}', 'update')->name('profiles.update');

        Route::get('/{user}/update-password', [UpdatePasswordController::class, 'edit'])->name('profiles.update-password');

        Route::post('/{user}/update-password', [UpdatePasswordController::class, 'update']);

    });

});
