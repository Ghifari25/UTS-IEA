<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;

Route::middleware('api')->group(function () {
    Route::get('/matakuliah', [MatakuliahController::class, 'index']);
    Route::get('/matakuliah/{kode}', [MatakuliahController::class, 'show']);
    Route::post('/matakuliah', [MatakuliahController::class, 'store']);
    Route::put('/matakuliah/{kode}', [MatakuliahController::class, 'update']);
    Route::delete('/matakuliah/{kode}', [MatakuliahController::class, 'destroy']);
});
