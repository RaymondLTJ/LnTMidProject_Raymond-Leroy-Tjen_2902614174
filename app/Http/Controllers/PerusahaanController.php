<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;


class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Perusahaan::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_perusahaan' => 'required',
                'alamat_perusahaan' => 'nullable|string',
                'telp' => 'nullable|numeric'
            ],
            [
                'nama_perusahaan.required' => 'Nama perusahaan harus diisi',
                'alamat_perusahaan.string' => 'Alamat harus berupa teks',
                'telp.numeric' => 'Telepon harus berupa angka'
            ]
        );

        $perusahaan = Perusahaan::create($request->all());
        return response()->json($perusahaan, 201);        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Perusahaan::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $request->validate(
            [
                'nama_perusahaan' => 'sometimes|required',
                'alamat_perusahaan' => 'nullable|string',
                'telp' => 'nullable|numeric'
            ],
            [
                'nama_perusahaan.required' => 'Nama perusahaan harus diisi',
                'alamat_perusahaan.string' => 'Alamat harus berupa teks',
                'telp.numeric' => 'Telepon harus berupa angka'
            ]
        );
        $perusahaan->update($request->all());
        return response()->json($perusahaan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();
        return response()->json(['message' => 'Perusahaan tela dihapus']);
    }
}
