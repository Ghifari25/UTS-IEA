<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        return response()->json(Matakuliah::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|unique:matakuliahs',
            'nama' => 'required|string',
            'sks' => 'required|integer',
        ]);

        $matkul = Matakuliah::create($validated);
        return response()->json($matkul, 201);
    }

    public function show($id)
    {
        $matkul = Matakuliah::findOrFail($id);
        return response()->json($matkul);
    }

    public function update(Request $request, $id)
    {
        $matkul = Matakuliah::findOrFail($id);
        $matkul->update($request->all());
        return response()->json($matkul);
    }

    public function destroy($id)
    {
        $matkul = Matakuliah::findOrFail($id);
        $matkul->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
