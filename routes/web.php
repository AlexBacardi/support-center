<?php

use App\Http\Controllers\Main\RequestController;
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


Route::middleware(['auth', 'verified'])->group(function() {

    Route::get('/', function () { return view('main.index'); })->name('index');

    Route::get('/technical-support/create', [RequestController::class, 'create'])->name('techical-support.create');

    Route::post('/technical-support/create', [RequestController::class, 'store']);

    Route::get('/technical-support/all-request', [RequestController::class, 'index'])->name('techical-support.all-request');

    Route::get('/technical-support/show/{request}', [RequestController::class, 'show'])->name('techical-support.show');
});




//Route::get('/technical-support/create', fn () => view('main.technical _support'))->middleware(['auth', 'verified'])->name('techical-support.create');
Route::get('/other-question/create', fn () => view('main.other_questions'))->middleware(['auth', 'verified'])->name('other-question.create');
Route::get('/cabinet', fn () => view('cabinet.profile'))->middleware(['auth', 'verified'])->name('cabinet.profile');
Route::get('/cabinet/edit', fn () => view('cabinet.profile_edit'))->middleware(['auth', 'verified'])->name('cabinet.edit');
//Route::get('/cabinet/all-queries', fn () => view('cabinet.all_queries'))->middleware(['auth', 'verified'])->name('cabinet.all-queries');
//Route::get('/cabinet/show-queries', fn () => view('cabinet.show_query'))->middleware(['auth', 'verified'])->name('cabinet.show-query');

