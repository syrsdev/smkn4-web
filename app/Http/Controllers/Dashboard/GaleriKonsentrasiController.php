<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\KonsentrasiKeahlian;
use Illuminate\Http\Request;

class GaleriKonsentrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $konsentrasi = KonsentrasiKeahlian::where('id', $request->id_konsentrasi)
            ->first();

        return view('dashboard.jurusan.galeri.create')
            ->with([
                'title' => 'Galeri Konsentrasi',
                'active' => 'Jurusan',
                'subActive' => 'Konsentrasi',
                'konsentrasi' => $konsentrasi,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_konsentrasi' => 'required',
            'gambar' => 'required|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        foreach ($request->file('gambar') as $file) {
            $gambar = time() . '.' . $file->extension();
            $file->move(public_path('/storage/jurusan/galeri'), $gambar);

            $galeri = [
                'id_konsentrasi' => $request->id_konsentrasi,
                'gambar' => '/storage/jurusan/galeri/'. $gambar,
            ];

            Galeri::create($galeri);
        }

        toast('Galeri Konsentrasi ditambahkan!', 'success');

        return redirect('/dashboard/jurusan/galeri?id_konsentrasi=' . $request->id_konsentrasi);
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        //
    }
}
