<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;
use App\Models\Matakuliah;

Route::apiResource('matakuliahs', MatakuliahController::class);
Route::get('/', function () {
        $data = Matakuliah::all();
        return view('matakuliah.index', compact('data'));
});
