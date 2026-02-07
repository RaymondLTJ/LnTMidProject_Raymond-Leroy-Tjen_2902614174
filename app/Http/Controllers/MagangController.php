<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magang;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $magang = Magang::with(['user','perusahaan'])->get();
        return response()->json($magang);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'user_id' => 'required|exists:users,id',
                'perusahaan_id' => 'required|exists:perusahaan,id',
                'judul_magang' => 'required',
                'mulai_magang' => 'required|date',
                'selesai_magang' => 'required|date',
                'status' => 'required|in:pending,approved,ongoing,finished,rejected'
            ],
            [
                'user_id.required' => 'User ID harus dipilih',
                'user_id.exists' => 'User tidak ditemukan',
                'perusahaan_id.required' => 'Perusahaan harus dipilih',
                'perusahaan_id.exists' => 'Perusahaan tidak ditemukan',
                'judul_magang.required' => 'Judul magang harus diisi',
                'mulai_magang.required' => 'Tanggal mulai harus diisi',
                'mulai_magang.date' => 'Tanggal mulai harus format tanggal',
                'selesai_magang.required' => 'Tanggal selesai harus diisi',
                'selesai_magang.date' => 'Tanggal selesai harus format tanggal',
                'status.required' => 'Status harus dipilih',
                'status.in' => 'Status harus pending, approved, ongoing, finished, atau rejected'
            ]
        );

        $magang = Magang::create($request->all());
        return response()->json($magang, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $magang = Magang::with(['user','perusahaan','reports'])->findOrFail($id);
        return response()->json($magang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $magang = Magang::findOrFail($id);

        $request->validate(
            [
                'judul' => 'sometimes|required',
                'mulai' => 'sometimes|required|date',
                'selesai' => 'sometimes|required|date',
                'status' => 'sometimes|required|in:pending,approved,running,finished,rejected',
                'perusahaan_id' => 'sometimes|required|exists:perusahaan,id',
                'user_id' => 'sometimes|required|exists:users,id'
            ],
            [
                'judul.required' => 'Judul harus diisi',
                'mulai.required' => 'Tanggal mulai harus diisi',
                'mulai.date' => 'Tanggal mulai harus format tanggal',
                'selesai.required' => 'Tanggal selesai harus diisi',
                'selesai.date' => 'Tanggal selesai harus format tanggal',
                'status.required' => 'Status harus dipilih',
                'status.in' => 'Status tidak valid',
                'perusahaan_id.required' => 'Perusahaan harus dipilih',
                'perusahaan_id.exists' => 'Perusahaan tidak ditemukan',
                'user_id.required' => 'User harus dipilih',
                'user_id.exists' => 'User tidak ditemukan'
            ]
        );

        $magang->update($request->all());
        return response()->json($magang);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $magang = Magang::findOrFail($id);
        $magang->delete();
        return response()->json(['message' => 'Magang telah dihapus']);
    }
}
