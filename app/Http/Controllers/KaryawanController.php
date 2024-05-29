<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Divisi;
use App\Models\Karyawan;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $karyawan = Karyawan::with('divisi', 'pekerjaan')->get();
        $divisi = Divisi::all();
    
        return Inertia::render('Karyawan/Index', [
            'karyawan' => $karyawan,
            'divisi' => $divisi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $divisi = Divisi::all();
        $pekerjaan = Pekerjaan::all();
        
        return Inertia::render('Karyawan/Create', [
            'divisiOptions' => $divisi,
            'pekerjaanOptions' => $pekerjaan,
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Karyawan::create($request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telepon' => ['required', 'string', 'max:15'],
            'alamat' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'aktif' => ['required', 'boolean'],
            'divisi_id' => ['required', 'integer'],
            'pekerjaan_id' => ['required', 'integer']
        ]));

        return Inertia::location(route('karyawan.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        $karyawan->load('divisi', 'pekerjaan');

        return Inertia::render('Karyawan/Show', [
            'karyawan' => $karyawan,
            'divisi' => $karyawan->divisi,
            'pekerjaan' => $karyawan->pekerjaan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        return Inertia::render('Karyawan/Edit', [
            'karyawan' => $karyawan,
            'divisiOptions' => Divisi::all(),
            'pekerjaanOptions' => Pekerjaan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $karyawan->update($request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telepon' => ['required', 'string', 'max:15'],
            'alamat' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'aktif' => ['required', 'boolean'],
            'divisi_id' => ['required', 'integer'],
            'pekerjaan_id' => ['required', 'integer']
        ]));

        return Inertia::location(route('karyawan.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return Inertia::location(route('karyawan.index'));
    }
}
