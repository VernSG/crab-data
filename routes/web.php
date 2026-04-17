<?php

use App\Http\Controllers\CatchRecordController;
use App\Http\Controllers\PredictionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/input', [CatchRecordController::class, 'create'])->name('input');
Route::post('/input', [CatchRecordController::class, 'store'])->name('input.store');
Route::get('/history', [CatchRecordController::class, 'history'])->name('history');

Route::get('/prediksi', [PredictionController::class, 'showForm'])->name('prediksi');
Route::post('/predict', [PredictionController::class, 'hitungPrediksi'])->name('predict');
Route::post('/retrain', [PredictionController::class, 'retrainModel'])->name('retrain');
