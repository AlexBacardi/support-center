<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Main\RequestController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users');

    Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');

    Route::get('/requests', [RequestController::class, 'adminAllRequest'])->name('admin.requests');

    Route::get('/requests/{request}', [RequestController::class, 'show'])->name('admin.requests.show');

});
