<?php

namespace App\Http\Controllers;

use App\Http\Resources\MatakuliahResource;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        return new MatakuliahResource($matakuliahs, 'Success', 'List Mata Kuliah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|unique:matakuliahs,kode',
            'nama' => 'required|string',
            'jadwal' => 'required|string',
        ]);

        if ($validator->fails()) {
            return new MatakuliahResource(null, 'Failed', $validator->errors());
        }

        $matakuliahs = Matakuliah::create($request->all());
        return new MatakuliahResource($matakuliahs, 'Success', 'Mata Kuliah created successfully');
    }

    public function show($kode)
    {
        $matakuliahs = Matakuliah::where('kode', $kode)->first();

        if ($matakuliahs) {
            return new MatakuliahResource($matakuliahs, 'Success', 'Mata Kuliah found');
        } else {
            return new MatakuliahResource(null, 'Failed', 'Mata Kuliah not found');
        }
    }

    public function update(Request $request, $kode)
    {
        $matakuliahs = Matakuliah::where('kode', $kode)->first();

        if (!$matakuliahs) {
            return new MatakuliahResource(null, 'Failed', 'Mata Kuliah not found');
        }

        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|unique:matakuliahs,kode,' . $matakuliahs->id,
            'nama' => 'required|string',
            'jadwal' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return new MatakuliahResource(null, 'Failed', $validator->errors());
        }

        $matakuliahs->update($request->all());
        return new MatakuliahResource($matakuliahs, 'Success', 'Mata Kuliah updated successfully');
    }

    public function destroy($kode)
    {
        $matakuliahs = Matakuliah::where('kode', $kode)->first();

        if (!$matakuliahs) {
            return new MatakuliahResource(null, 'Failed', 'Mata Kuliah not found');
        }

        $matakuliahs->delete();
        return new MatakuliahResource(null, 'Success', 'Mata Kuliah deleted successfully');
    }
}
