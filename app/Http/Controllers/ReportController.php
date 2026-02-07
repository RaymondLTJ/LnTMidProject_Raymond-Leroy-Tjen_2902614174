<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report = Report::with('magang.user')->get();
        return response()->json($report);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'magang_id' => 'required|exists:magang,id',
                'tanggal_magang' => 'required|date',
                'kegiatan_magang' => 'required',
                'status' => 'sometimes|required|in:pending,revised,approved'
            ],
            [
                'magang_id.required' => 'Magang ID harus diisi',
                'magang_id.exists' => 'Magang dengan ID tersebut tidak ditemukan',
                'tanggal_magang.required' => 'Tanggal magang harus diisi',
                'tanggal_magang.date' => 'Tanggal magang harus format tanggal',
                'kegiatan_magang.required' => 'Kegiatan magang harus diisi',
                'status.required' => 'Status harus dipilih',
                'status.in' => 'Status harus pending, revised, atau approved'
            ]
        );
        
        $report = Report::create($request->all());
        return response()->json($report, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $report = Report::with('magang.user')->findOrFail($id);
        return response()->json($report);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $report = Report::findOrFail($id);

        $request->validate(
            [
                'magang_id' => 'required|exists:magang,id',
                'tanggal_magang' => 'sometimes|required|date',
                'kegiatan_magang' => 'sometimes|required',
                'status' => 'sometimes|required|in:pending,revised,approved'
            ],
            [
                'magang_id.required' => 'Magang ID harus diisi',
                'magang_id.exists' => 'Magang dengan ID tersebut tidak ditemukan',
                'tanggal_magang.required' => 'Tanggal harus diisi',
                'tanggal_magang.date' => 'Tanggal harus format tanggal',
                'kegiatan_magang.required' => 'Kegiatan harus diisi',
                'status.required' => 'Status harus dipilih',
                'status.in' => 'Status harus pending, revised, atau approved'
            ]
        );
        $report->update($request->all());
        return response()->json($report);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = Report::findOrFail($id);

        $report->delete();
        return response()->json(['message' => 'Report telah dihapus']);
    }
}
