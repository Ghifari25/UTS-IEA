<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;

Route::middleware('api')->group(function () {
    // GET semua matakuliah
    Route::get('/matakuliah', [MatakuliahController::class, 'index']);

    // GET matakuliah berdasarkan ID
    Route::get('/matakuliah/{id}', [MatakuliahController::class, 'show']);

    // POST buat matakuliah baru
    Route::post('/matakuliah', [MatakuliahController::class, 'store']);

    // PUT update matakuliah
    Route::put('/matakuliah/{id}', [MatakuliahController::class, 'update']);

    // DELETE matakuliah
    Route::delete('/matakuliah/{id}', [MatakuliahController::class, 'destroy']);
});
