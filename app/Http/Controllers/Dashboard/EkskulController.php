<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekskul = Ekskul::orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Ekstrakurikuler?');

        return view('dashboard.ekskul.index')
            ->with([
                'title'     => 'Data Ekstrakurikuler',
                'active'    => 'Kesiswaan',
                'subActive' => 'Ekstrakurikuler',
                'ekskul'    => $ekskul,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.ekskul.create')
            ->with([
                'title'     => 'Tambah Data Ekstrakurikuler',
                'active'    => 'Kesiswaan',
                'subActive' => 'Ekstrakurikuler',
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'        => ['required', 'string', 'unique:ekskul,nama', 'max:255'],
            'link_sosmed' => ['nullable'],
        ]);

        $slug = Str::slug($request->input('nama'));

        $ekskul = [
            'slug'        => $slug,
            'nama'        => strtoupper($request->input('nama')),
            'link_sosmed' => $request->input('link_sosmed'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg'] 
            ]);

            $file = $request->file('gambar');
            $gambar = $slug . '.' . $file->extension();
            $file->move(public_path('storage/ekskul'), $gambar);

            $ekskul['gambar'] = '/storage/ekskul/' . $gambar;
        }

        try {
            Ekskul::create($ekskul);

            toast('Data Ekstrakurikuler berhasil dibuat!', 'success');

            return redirect()->route('ekskul.index');
        } catch (\Exception $e) {
            toast('Data Ekstrakurikuler gagal dibuat.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ekskul $ekskul)
    {
        return view('dashboard.ekskul.edit')
            ->with([
                'title'     => 'Edit Data Ekstrakurikuler',
                'active'    => 'Kesiswaan',
                'subActive' => 'Ekstrakurikuler',
                'ekskul'    => $ekskul,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ekskul $ekskul)
    {
        $request->validate([
            'nama'        => ['required', 'string', 'unique:ekskul,nama,'.$ekskul->id, 'max:255'],
            'link_sosmed' => ['nullable'],
        ]);

        $slug = Str::slug($request->input('nama'));

        $updatedEkskul = [
            'slug'        => $slug,
            'nama'        => strtoupper($request->input('nama')),
            'link_sosmed' => $request->input('link_sosmed'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg'] 
            ]);

            $file = $request->file('gambar');
            $gambar = $slug . '.' . $file->extension();

            if ($ekskul->gambar !== '/images/default/icon-ekskul.png') {
                File::delete(public_path($ekskul->gambar));
            }
            
            $file->move(public_path('storage/ekskul'), $gambar);
            $updatedEkskul['gambar'] = '/storage/ekskul/' . $gambar;
        }
        
        try {
            $ekskul->update($updatedEkskul);
    
            toast('Data Ekstrakurikuler berhasil diedit!', 'success');

            return redirect()->route('ekskul.index');
        } catch (\Exception $e) {
            toast('Data Ekstrakurikuler gagal diedit.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ekskul $ekskul)
    {
        if ($ekskul->gambar !== '/images/default/icon-ekskul.png') {
            File::delete(public_path($ekskul->gambar));
        }

        $ekskul->delete();

        toast('Data Ekstrakurikuler berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
