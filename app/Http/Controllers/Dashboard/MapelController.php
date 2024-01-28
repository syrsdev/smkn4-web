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
                'title'     => 'Data Mata Pelajaran',
                'active'    => 'Guru',
                'subActive' => null,
                'mapel'     => $mapel,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mapel' => ['required', 'string', 'unique:mapel,nama', 'max:255'],
        ]);

        try {
            Mapel::create([
                'slug' => Str::slug($request->input('mapel')),
                'nama' => $request->input('mapel'),
            ]);

            toast('Mata Pelajaran berhasil dibuat!', 'success');
        } catch (\Exception $e) {
            toast('Mata Pelajaran gagal dibuat.', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'mapel' => ['required', 'string', 'unique:mapel,nama,'.$mapel->id, 'max:255'],
        ]);

        try {
            $mapel->update([
                'slug' => Str::slug($request->input('mapel')),
                'nama' => $request->input('mapel'),
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
