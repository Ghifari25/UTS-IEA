<?php

namespace App\Http\Controllers;

use App\Http\Resources\MatakuliahResource;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Iluminate\Support\Facades\Http;

class MatakuliahService
{
    public function getAll()
    {
        $response = Http::get('http://localhost:8001/api/matakuliah');
        return $response->json();
    }

    public function showMatkul(MatakuliahService $matakuliahs)
    {
        $data = $matakuliahs->gettAll();
        return response()->json($data);
    }
}

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
            'kode' => 'required|string',    
            'nama' => 'required|string',
            'jadwal' => 'required|string',
        ]);

        if ($validator->fails()) {
            return new MatakuliahResource(null, 'Failed', $validator->errors());
        }

        $matakuliahs = Matakuliah::create($request->all());
        return new MatakuliahResource($matakuliahs, 'Success', 'Mata Kuliah created successfully');
    }

    public function show($id)
    {
        $matakuliahs = Matakuliah::where('id', $id)->first();

        if ($matakuliahs) {
            return new MatakuliahResource($matakuliahs, 'Success', 'Mata Kuliah found');
        } else {
            return new MatakuliahResource(null, 'Failed', 'Mata Kuliah not found');
        }
    }

    public function update(Request $request, $id)
    {
        // Ambil data mata kuliah berdasarkan ID
        $matakuliahs = Matakuliah::find($id);

        // Cek apakah mata kuliah ditemukan
        if (!$matakuliahs) {
            return new MatakuliahResource(null, 'Failed', 'Mata Kuliah not found');
        }

        // Validasi data yang diterima
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|unique:matakuliahs,kode,' . $id,  // Pastikan kode unik, kecuali pada record yang sedang diupdate
            'nama' => 'required|string',
            'jadwal' => 'required|string',  // Jadwal harus string (sesuai format waktu)
        ]);

        // Jika validasi gagal, return error
        if ($validator->fails()) {
            return new MatakuliahResource(null, 'Failed', $validator->errors());
        }

        // Update data mata kuliah dengan data yang valid
        $matakuliahs->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'jadwal' => $request->jadwal
        ]);

        // Kembalikan response sukses
        return new MatakuliahResource($matakuliahs, 'Success', 'Mata Kuliah updated successfully');
    }

    public function destroy($id)
    {
        $matakuliahs = Matakuliah::where('id', $id)->first();

        if (!$matakuliahs) {
            return new MatakuliahResource(null, 'Failed', 'Mata Kuliah not found');
        }

        $matakuliahs->delete();
        return new MatakuliahResource(null, 'Success', 'Mata Kuliah deleted successfully');
    }
}
