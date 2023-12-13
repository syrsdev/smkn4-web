<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestasi = Prestasi::with('penulis')
            ->latest()
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Prestasi?');

        return view('dashboard.prestasi.index')->with([
            'title' => 'Data Prestasi',
            'active' => 'Kesiswaan',
            'subActive' => 'Prestasi',
            'prestasi' => $prestasi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.prestasi.create')
            ->with([
                'title' => 'Tambah Prestasi', 
                'active' => 'Kesiswaan', 
                'subActive' => 'Prestasi'
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->input('judul'));
        Session::flash('konten', $request->input('konten'));
        Session::flash('peserta', $request->input('peserta'));

        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'konten' => 'required',
            'peserta' => 'required',
            'id_penulis' => 'required',
        ]);

        $judul = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('judul'));        
        $slug = strtolower(str_replace(' ', '-', $judul));

        $prestasi = [
            'slug' => $slug,
            'judul' => $request->input('judul'),
            'kategori' => $request->input('kategori'),
            'konten' => $request->input('konten'),
            'peserta' => $request->input('peserta'),
            'id_penulis' => $request->input('id_penulis'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg'] 
            ]);

            $file = $request->file('gambar');
            $gambar = $slug . '.' . $file->extension();
            $file->move(public_path('storage/prestasi'), $gambar);

            $prestasi['gambar'] = '/storage/prestasi/' . $gambar;
        }

        try {
            Prestasi::create($prestasi);

            toast('Prestasi berhasil dibuat!', 'success');

            return redirect()->route('prestasi.index');
        } catch (\Exception $e) {
            toast('Prestasi gagal dibuat.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasi $prestasi)
    {
        $other = Prestasi::with('penulis')
            ->where('slug', '!=', $prestasi->slug)
            ->latest()
            ->limit(3)
            ->get();

        return view('dashboard.prestasi.detail')
            ->with([
                'title' => 'Detail Prestasi', 
                'active' => 'Kesiswaan', 
                'subActive' => 'Prestasi', 
                'prestasi' => $prestasi,
                'other' => $other,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasi $prestasi)
    {
        return view('dashboard.prestasi.edit')
            ->with([
                'title' => 'Edit Prestasi', 
                'active' => 'Kesiswaan', 
                'subActive' => 'Prestasi', 
                'prestasi' => $prestasi,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'konten' => 'required',
            'peserta' => 'required',
            'id_penulis' => 'required',
        ]);

        $judul = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('judul'));        
        $slug = strtolower(str_replace(' ', '-', $judul));

        $updatedPrestasi = [
            'slug' => $slug,
            'judul' => $request->input('judul'),
            'kategori' => $request->input('kategori'),
            'konten' => $request->input('konten'),
            'peserta' => $request->input('peserta'),
            'id_penulis' => $request->input('id_penulis'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg'] 
            ]);

            $file = $request->file('gambar');
            $gambar = $slug . '.' . $file->extension();

            if ($prestasi->gambar !== '/images/default/no-image-43.png') {
                File::delete(public_path($prestasi->gambar));
            }

            $file->move(public_path('storage/prestasi'), $gambar);
            $updatedPrestasi['gambar'] = '/storage/prestasi/' . $gambar;
        }
        
        try {
            $prestasi->update($updatedPrestasi);
    
            toast('Prestasi berhasil diedit!', 'success');

            return redirect()->route('prestasi.index');
        } catch (\Exception $e) {
            toast('Prestasi gagal diedit.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->gambar !== '/images/default/no-image-43.png') {
            File::delete(public_path($prestasi->gambar));
        }

        $prestasi->delete();

        toast('Prestasi berhasil dihapus.', 'success');

        return redirect()->back();
    }

    public function update_status(Request $request, Prestasi $prestasi)
    {
        $prestasi->update(['status' => $request->status]);

        return response()->json(['slug' => $prestasi->slug, 'status' => $request->status]);
    }
}
