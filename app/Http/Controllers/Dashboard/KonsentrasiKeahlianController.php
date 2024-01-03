<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KonsentrasiKeahlian;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class KonsentrasiKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsentrasi = KonsentrasiKeahlian::with(['program', 'program.bidang'])
            ->orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Konsentrasi Keahlian?');

        return view('dashboard.jurusan.konsentrasi.index')
            ->with([
                'title' => 'Konsentrasi Keahlian',
                'active' => 'Jurusan',
                'subActive' => 'Konsentrasi',
                'konsentrasi' => $konsentrasi,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = ProgramKeahlian::orderBy('nama', 'asc')
            ->get();

        return view('dashboard.jurusan.konsentrasi.create')
            ->with([
                'title' => 'Tambah Konsentrasi Keahlian',
                'active' => 'Jurusan',
                'subActive' => 'Konsentrasi',
                'program' => $program,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'id_program' => 'required',
        ]);

        $slug = Str::slug($request->input('nama'));

        $konsentrasi = [
            'slug' => $slug,
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'id_program' => $request->input('id_program'),
        ];

        if ($request->hasFile('icon')) {
            $request->validate([
                'icon' => ['nullable', 'file', 'image', 'mimes:png,jpg'],
            ]);

            $file = $request->file('icon');
            $icon = 'icon-' . $slug . '.' . $file->extension();
            $file->move(public_path('storage/jurusan/konsentrasi'), $icon);

            $konsentrasi['icon'] = '/storage/jurusan/konsentrasi/' . $icon;
        }

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg'],
            ]);

            $file = $request->file('gambar');
            $gambar = $slug . '.' . $file->extension();
            $file->move(public_path('storage/jurusan/konsentrasi'), $gambar);

            $konsentrasi['gambar'] = '/storage/jurusan/konsentrasi/' . $gambar;
        }

        try {
            KonsentrasiKeahlian::create($konsentrasi);

            toast('Konsentrasi Keahlian berhasil dibuat!', 'success');

            return redirect()->route('konsentrasi.index');
        } catch (\Exception $e) {
            toast('Konsentrasi Keahlian gagal dibuat!', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KonsentrasiKeahlian $konsentrasi)
    {
        $konsentrasi->load(['program', 'program.bidang', 'galeri']);

        confirmDelete('Hapus Gambar?', 'Yakin ingin hapus gambar dari galeri?');

        return view('dashboard.jurusan.konsentrasi.detail')
            ->with([
                'title' => 'Detail Konsentrasi Keahlian',   
                'active' => 'Jurusan',
                'subActive' => 'Konsentrasi',
                'konsentrasi' => $konsentrasi,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KonsentrasiKeahlian $konsentrasi)
    {
        $program = ProgramKeahlian::orderBy('nama', 'asc')
            ->get();

        return view('dashboard.jurusan.konsentrasi.edit')
            ->with([
                'title' => 'Edit Konsentrasi Keahlian',
                'active' => 'Jurusan',
                'subActive' => 'Konsentrasi',
                'konsentrasi' => $konsentrasi,
                'program' => $program,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KonsentrasiKeahlian $konsentrasi)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'id_program' => 'required',
        ]);

        $slug = Str::slug($request->input('nama'));

        $newKonsentrasi = [
            'slug' => $slug,
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'id_program' => $request->input('id_program'),
        ];

        if ($request->hasFile('icon')) {
            $request->validate([
                'icon' => ['nullable', 'file', 'image', 'mimes:png,jpg'],
            ]);

            $file = $request->file('icon');
            $icon = 'icon-' . $slug . '.' . $file->extension();

            if ($konsentrasi->icon !== '/images/default/icon-jurusan.png') {
                File::delete(public_path($konsentrasi->icon));
            }
            
            $file->move(public_path('storage/jurusan/konsentrasi'), $icon);
            $newKonsentrasi['icon'] = '/storage/jurusan/konsentrasi/' . $icon;
        }

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg'],
            ]);

            $file = $request->file('gambar');
            $gambar = $slug . '.' . $file->extension();

            if ($konsentrasi->gambar !== '/images/default/no-image-169.png') {
                File::delete(public_path($konsentrasi->gambar));
            }
            
            $file->move(public_path('storage/jurusan/konsentrasi'), $gambar);
            $newKonsentrasi['gambar'] = '/storage/jurusan/konsentrasi/' . $gambar;
        }

        try {
            $konsentrasi->update($newKonsentrasi);

            toast('Konsentrasi Keahlian berhasil diedit!', 'success');

            return redirect()->route('konsentrasi.index');
        } catch (\Exception $e) {
            toast('Konsentrasi Keahlian gagal diedit!', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KonsentrasiKeahlian $konsentrasi)
    {
        if ($konsentrasi->icon !== '/images/default/icon-jurusan.png') {
            File::delete(public_path($konsentrasi->icon));
        }

        if ($konsentrasi->gambar !== '/images/default/no-image-169.png') {
            File::delete(public_path($konsentrasi->gambar));
        }

        $konsentrasi->delete();

        toast('Konsentrasi Keahlian berhasil dihapus!', 'success');

        return redirect()->back();
    }

    public function update_image(Request $request, KonsentrasiKeahlian $konsentrasi)
    {
        $request->validate([
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $file = $request->file('gambar');
        $gambarNama = $konsentrasi->slug . '.' . $file->extension();

        if ($konsentrasi->gambar !== '/images/default/no-image-169.png') {
            File::delete(public_path($konsentrasi->gambar));
        }
        
        $file->move(public_path('storage/jurusan/konsentrasi'), $gambarNama);
        $gambar = '/storage/jurusan/konsentrasi/' . $gambarNama;

        try {
            $konsentrasi->update(['gambar' => $gambar,]);
            toast('Konsentrasi Keahlian berhasil diedit!', 'success');
        } catch (\Exception $e) {
            toast('Konsentrasi Keahlian gagal diedit!', 'warning');
        }

        return redirect()->back();
    }
}
