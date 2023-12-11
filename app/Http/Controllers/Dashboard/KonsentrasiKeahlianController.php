<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KonsentrasiKeahlian;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = strtolower(str_replace(' ', '-', $nama));

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
        $konsentrasi->load(['program', 'program.bidang']);

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

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = strtolower(str_replace(' ', '-', $nama));

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
}
