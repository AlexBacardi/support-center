<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromtController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main.index');

})->middleware(['auth', 'verified'])->name('index');


Route::get('/register', [RegisterController::class, 'create'])->middleware(['guest'])->name('register');

Route::post('/register', [RegisterController::class, 'store'])->middleware(['guest']);


Route::get('/login', [LoginController::class, 'create'])->middleware(['guest'])->name('login');

Route::post('/login', [LoginController::class, 'store'])->middleware(['guest']);


Route::delete('/logout', [LoginController::class, 'destroy'])->middleware(['auth'])->name('logout');


Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->middleware(['guest'])->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware(['guest'])->name('password.email');


Route::get('/reset-password', [ResetPasswordController::class, 'create'])->middleware(['guest'])->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store'])->middleware(['guest'])->name('password.update');



Route::get('/email/verify', EmailVerificationPromtController::class)->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', EmailVerificationNotificationController::class)->middleware(['auth'])->name('verification.send');


Route::get('/technical-support/create', fn () => view('main.technical _support'))->middleware(['auth', 'verified'])->name('techical-support.create');
Route::get('/other-question/create', fn () => view('main.other_questions'))->middleware(['auth', 'verified'])->name('other-question.create');
Route::get('/cabinet', fn () => view('cabinet.profile'))->middleware(['auth', 'verified'])->name('cabinet.profile');
Route::get('/cabinet/edit', fn () => view('cabinet.profile_edit'))->middleware(['auth', 'verified'])->name('cabinet.edit');
Route::get('/cabinet/all-queries', fn () => view('cabinet.all_queries'))->middleware(['auth', 'verified'])->name('cabinet.all-queries');
Route::get('/cabinet/show-queries', fn () => view('cabinet.show_query'))->middleware(['auth', 'verified'])->name('cabinet.show-query');

