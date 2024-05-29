<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $karyawans = Karyawan::all();

        return response()->json([
            'message' => 'success',
            'data' => $karyawans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'aktif' => 'required|boolean',
            'divisi_id' => 'required|integer',
            'pekerjaan_id' => 'required|integer'
        ]);
    
        $karyawan = new Karyawan($validator);
    
        if($karyawan->save()) {
            return response()->json([
                'status' => 'berhasil menambahkan data',
                'data' => $karyawan
            ]);
        } else {
            return response()->json([
                'status' => 'gagal menambahkan data',
                'data' => null
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        return response()->json([
            'message' => 'success',
            'data' => $karyawan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $validator = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'aktif' => 'required|boolean',
            'divisi_id' => 'required|integer',
            'pekerjaan_id' => 'required|integer'
        ]);
    
        $karyawan->update($validator);
    
        return response()->json([
            'message' => 'berhasil mengubah data',
            'data' => $karyawan
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        if($karyawan->delete()) {
            return response()->json([
                'status' => 'berhasil menghapus data',
                'data' => $karyawan
            ]);
        } else {
            return response()->json([
                'status' => 'gagal menghapus data',
                'data' => null
            ], 500);
        }
    }
}
