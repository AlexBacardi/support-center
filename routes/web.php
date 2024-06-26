<?php

use App\Http\Controllers\Main\CommentController;
use App\Http\Controllers\Main\FileController;
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


Route::middleware(['auth', 'verified', 'isUserBan',])->group(function() {

    Route::get('/', function () { return view('main.index'); })->name('index');

    Route::get('/technical-support/create', [RequestController::class, 'createSupportRequest'])->name('techical-support.create');

    Route::post('/technical-support/create', [RequestController::class, 'storeSupportRequest']);

    Route::get('/servicedesk/all-request', [RequestController::class, 'index'])->name('servicedesk.all-request');

    Route::get('/servicedesk/{request}', [RequestController::class, 'show'])->name('servicedesk.show');

    Route::post('/servicedesk/{request}', [RequestController::class, 'update'])->name('servicedesk.update');

    Route::post('/servicedesk/{request}/create', [CommentController::class, 'store'])->name('servicedesk.comments.store');

    Route::get('/other/create', [RequestController::class, 'createOtherRequest'])->name('other.create');

    Route::post('/other/create', [RequestController::class, 'storeOtherRequest']);

    Route::get('/load/{file}', [FileController::class, 'downLoad'])->name('download.file');

});

//  TODO убрать роут с жалобами в админ часть
Route::get('/admin/all-complaints', function() {
    return view('admin.all_complaints');
})->name('admin.all-complaints');


