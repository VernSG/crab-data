<?php

use App\Http\Controllers\CatchRecordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/input', [CatchRecordController::class, 'create'])->name('input');
Route::post('/input', [CatchRecordController::class, 'store'])->name('input.store');
Route::get('/history', [CatchRecordController::class, 'history'])->name('history');
