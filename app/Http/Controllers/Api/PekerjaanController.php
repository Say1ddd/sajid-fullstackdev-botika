<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::all();
        return response()->json([
            'status' => 'success',
            'data' => $pekerjaan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama_pekerjaan' => 'required|string|max:255',
            'deskripsi_pekerjaan' => 'required|string',
        ]);

        $pekerjaan = new Pekerjaan($validator);

        if ($pekerjaan->save()) {
            return response()->json([
                'status' => 'berhasil menambahkan data',
                'data' => $pekerjaan,
            ]);
        } else {
            return response()->json([
                'status' => 'gagal menambahkan data',
                'data' => null,
            ], 500);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Pekerjaan $pekerjaan)
    {
        return response()->json([
            'status' => 'success',
            'data' => $pekerjaan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $validator = $request->validate([
            'nama_pekerjaan' => 'required|string|max:255',
            'deskripsi_pekerjaan' => 'required|string',
        ]);

        $pekerjaan->update($validator);

        return response()->json([
            'message' => 'berhasil mengubah data',
            'data' => $pekerjaan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pekerjaan $pekerjaan)
    {
        if ($pekerjaan->delete()) {
            return response()->json([
                'status' => 'berhasil menghapus data',
                'data' => $pekerjaan,
            ]);
        } else {
            return response()->json([
                'status' => 'gagal menghapus data',
                'data' => null,
            ], 500);
        }
    }
}
