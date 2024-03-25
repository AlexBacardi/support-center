<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Main\RequestController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin', 'isUserBan'])->prefix('admin-panel')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::prefix('users')->controller(UserController::class)->group(function () {

        Route::get('/', 'index')->name('admin.users');

        Route::get('/{user}', 'show')->name('admin.users.show');

        Route::get('/{user}/edit', 'edit')->name('admin.users.edit');

        Route::post('/{user}', 'update')->name('admin.users.update');

    });

    Route::get('/requests', [RequestController::class, 'adminAllRequest'])->name('admin.requests');

    Route::get('/requests/{request}', [RequestController::class, 'show'])->name('admin.requests.show');

});
