<?php

namespace App\Http\Controllers\Api;

use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisi = Divisi::all();
        return response()->json([
            'status' => 'success',
            'data' => $divisi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama_divisi' => 'required|string|max:255',
            'deskripsi_divisi' => 'required|string',
            'lokasi' => 'required|string',
        ]);

        $divisi = new Divisi($validator);

        if ($divisi->save()) {
            return response()->json([
                'status' => 'berhasil menambahkan data',
                'data' => $divisi,
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
    public function show(Divisi $divisi)
    {
        return response()->json([
            'status' => 'success',
            'data' => $divisi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divisi $divisi)
    {
        $validator = $request->validate([
            'nama_divisi' => 'required|string|max:255',
            'deskripsi_divisi' => 'required|string',
            'lokasi' => 'required|string',
        ]);

        $divisi->update($validator);
    
        return response()->json([
            'message' => 'berhasil mengubah data',
            'data' => $divisi
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divisi $divisi)
    {
        if ($divisi->delete()) {
            return response()->json([
                'status' => 'berhasil menghapus data',
                'data' => $divisi,
            ]);
        } else {
            return response()->json([
                'status' => 'gagal menghapus data',
                'data' => null,
            ], 500);
        }
    }
}
