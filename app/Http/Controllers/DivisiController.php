<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Divisi/Index', [
            'divisi' => Divisi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Divisi/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Divisi::create($request->validate([
            'nama_divisi' => ['required', 'string', 'max:255'],
            'deskripsi_divisi' => ['required', 'string'],
            'lokasi' => ['required', 'string'],
        ]));

        return Inertia::location(route('divisi.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Divisi $divisi)
    {
        return Inertia::render('Divisi/Show', [
            'divisi' => $divisi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divisi $divisi)
    {
        return Inertia::render('Divisi/Edit', [
            'divisi' => $divisi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divisi $divisi)
    {
        $divisi->update($request->validate([
            'nama_divisi' => ['required', 'string', 'max:255'],
            'deskripsi_divisi' => ['required', 'string'],
            'lokasi' => ['required', 'string'],
        ]));

        return Inertia::location(route('divisi.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();

        return redirect()->route('divisi.index');
    }
}
