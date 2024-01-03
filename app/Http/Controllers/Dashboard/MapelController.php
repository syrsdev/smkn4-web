<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapel = Mapel::withCount('pendidik')
            ->orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Mata Pelajaran?');

        return view('dashboard.mapel.index')
            ->with([
                'title' => 'Data Mata Pelajaran',
                'active' => 'Guru',
                'subActive' => null,
                'mapel' => $mapel,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        try {
            Mapel::create([
                'slug' => Str::slug($request->input('nama')),
                'nama' => $request->input('nama'),
            ]);

            toast('Mata Pelajaran berhasil dibuat!', 'success');
        } catch (\Exception $e) {
            toast('Mata Pelajaran gagal dibuat.', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        try {
            $mapel->update([
                'slug' => Str::slug($request->input('nama')),
                'nama' => $request->input('nama'),
            ]);

            toast('Mata Pelajaran berhasil diedit!', 'success');
        } catch (\Exception $e) {
            toast('Mata Pelajaran gagal diedit.', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        toast('Mata Pelajaran berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
