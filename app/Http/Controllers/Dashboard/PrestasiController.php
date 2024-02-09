<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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

        confirmDelete('Hapus Data?', 'Anda yakin ingin hapus Data Prestasi?');

        return view('dashboard.prestasi.index')
            ->with([
                'title'     => 'Data Prestasi',
                'active'    => 'Kesiswaan',
                'subActive' => 'Prestasi',
                'prestasi'  => $prestasi,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.prestasi.create')
            ->with([
                'title'     => 'Tambah Data Prestasi', 
                'active'    => 'Kesiswaan', 
                'subActive' => 'Prestasi'
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'    => ['required', 'string', 'unique:prestasi,judul', 'max:255'],
            'kategori' => ['required'],
            'konten'   => ['required', 'string'],
            'peserta'  => ['required', 'string', 'max:255'],
            'penulis'  => ['required'],
        ]);

        $slug = Str::slug($request->input('judul'));

        $prestasi = [
            'slug'       => $slug,
            'judul'      => $request->input('judul'),
            'kategori'   => $request->input('kategori'),
            'konten'     => $request->input('konten'),
            'peserta'    => $request->input('peserta'),
            'id_penulis' => $request->input('penulis'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg,jpeg,gif,webp'] 
            ]);

            $file = $request->file('gambar');
            $gambar = $slug . '.' . $file->extension();
            $file->move(public_path('storage/prestasi'), $gambar);

            $prestasi['gambar'] = '/storage/prestasi/' . $gambar;
        }

        try {
            Prestasi::create($prestasi);

            toast('Data Prestasi berhasil dibuat!', 'success');

            return redirect()->route('prestasi.index');
        } catch (\Exception $e) {
            toast('Data Prestasi gagal dibuat.', 'warning');

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
                'title'     => 'Detail Data Prestasi', 
                'active'    => 'Kesiswaan', 
                'subActive' => 'Prestasi', 
                'prestasi'  => $prestasi,
                'other'     => $other,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasi $prestasi)
    {
        return view('dashboard.prestasi.edit')
            ->with([
                'title'     => 'Edit Data Prestasi', 
                'active'    => 'Kesiswaan', 
                'subActive' => 'Prestasi', 
                'prestasi'  => $prestasi,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'judul'    => ['required', 'string', 'unique:prestasi,judul,'.$prestasi->id, 'max:255'],
            'kategori' => ['required'],
            'konten'   => ['required', 'string'],
            'peserta'  => ['required', 'string', 'max:255'],
            'penulis'  => ['required'],
        ]);

        $slug = Str::slug($request->input('judul'));        

        $updatedPrestasi = [
            'slug'       => $slug,
            'judul'      => $request->input('judul'),
            'kategori'   => $request->input('kategori'),
            'konten'     => $request->input('konten'),
            'peserta'    => $request->input('peserta'),
            'id_penulis' => $request->input('penulis'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg,jpeg,gif,webp'] 
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
    
            toast('Data Prestasi berhasil diedit!', 'success');

            return redirect()->route('prestasi.index');
        } catch (\Exception $e) {
            toast('Data Prestasi gagal diedit.', 'warning');

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

        toast('Data Prestasi berhasil dihapus.', 'success');

        return redirect()->back();
    }

    public function update_status(Request $request, Prestasi $prestasi)
    {
        $prestasi->update(['status' => $request->status]);

        return response()->json(['slug' => $prestasi->slug, 'status' => $request->status]);
    }
}
