<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\KonsentrasiKeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GaleriKonsentrasiController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $konsentrasi = KonsentrasiKeahlian::where('id', $request->id_konsentrasi)
            ->first();

        return view('dashboard.jurusan.galeri.create')
            ->with([
                'title'       => 'Tambah Gambar ke Galeri',
                'active'      => 'Jurusan',
                'subActive'   => 'Konsentrasi',
                'konsentrasi' => $konsentrasi,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'konsentrasi' => ['required'],
            'gambar'      => ['required', 'array'],
            'gambar.*'    => ['file', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp'],
        ]);

        $konsentrasi = KonsentrasiKeahlian::where('id', $request->konsentrasi)
            ->first();

        foreach ($request->file('gambar.*') as $file) {
            $gambar = Str::uuid() . '.' . $file->extension();
            $file->move(public_path('/storage/jurusan/galeri'), $gambar);

            $galeri = [
                'id_konsentrasi' => $request->konsentrasi,
                'gambar'         => '/storage/jurusan/galeri/'. $gambar,
            ];

            Galeri::create($galeri);
        }

        toast('Gambar berhasil ditambahkan!', 'success');

        return redirect()->route('konsentrasi.show', $konsentrasi->slug);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Galeri $galeri)
    {
        $konsentrasi = KonsentrasiKeahlian::where('id', $request->id_konsentrasi)
            ->first();

        return view('dashboard.jurusan.galeri.edit')
            ->with([
                'title'       => 'Edit Gambar untuk Galeri',
                'active'      => 'Jurusan',
                'subActive'   => 'Konsentrasi',
                'konsentrasi' => $konsentrasi,
                'galeri'      => $galeri,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'id_konsentrasi' => ['required'],
            'keterangan'     => ['nullable'],
        ]);

        $konsentrasi = KonsentrasiKeahlian::where('id', $request->input('id_konsentrasi'))
            ->first();

        $update = [
            'id_konsentrasi' => $request->input('id_konsentrasi'),
            'keterangan'     => $request->input('keterangan') ?? 'Tidak ada keterangan',
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);

            $file = $request->file('gambar');
            $gambar = time() . '.' . $file->extension();

            File::delete(public_path($galeri->gambar));
            $file->move(public_path('/storage/jurusan/galeri'), $gambar);

            $update['gambar'] = '/storage/jurusan/galeri/' . $gambar;
        }

        try {
            $galeri->update($update);
    
            toast('Gambar berhasil diedit!', 'success');
    
            return redirect()->route('konsentrasi.show', $konsentrasi->slug);
        } catch (\Exception $e) {
            toast('Gambar gagal diedit.', 'warning');
    
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        File::delete(public_path($galeri->gambar));

        $galeri->delete();

        toast('Gambar berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
