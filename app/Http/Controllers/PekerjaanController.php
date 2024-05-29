<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Pekerjaan/Index', [
            'pekerjaan' => Pekerjaan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Pekerjaan/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pekerjaan::create($request->validate([
            'nama_pekerjaan' => ['required', 'string', 'max:255'],
            'deskripsi_pekerjaan' => ['required', 'string'],
        ]));

        return Inertia::location(route('pekerjaan.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pekerjaan $pekerjaan)
    {
        return Inertia::render('Pekerjaan/Show', [
            'pekerjaan' => $pekerjaan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pekerjaan $pekerjaan)
    {
        return Inertia::render('Pekerjaan/Edit', [
            'pekerjaan' => $pekerjaan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $pekerjaan->update($request->validate([
            'nama_pekerjaan' => ['required', 'string', 'max:255'],
            'deskripsi_pekerjaan' => ['required', 'string'],
        ]));

        return Inertia::location(route('pekerjaan.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pekerjaan $pekerjaan)
    {
        $pekerjaan->delete();

        return redirect()->route('pekerjaan.index');
    }
}
