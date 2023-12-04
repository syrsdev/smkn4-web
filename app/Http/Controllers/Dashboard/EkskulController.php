<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

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

        return view('dashboard.ekskul.index')->with([
            'title' => 'Ekstrakurikuler',
            'active' => 'Kesiswaan',
            'subActive' => 'Ekstrakurikuler',
            'ekskul' => $ekskul,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.ekskul.create')->with([
            'title' => 'Tambah Ekstrakurikuler',
            'active' => 'Kesiswaan',
            'subActive' => 'Ekstrakurikuler',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->input('nama'));
        Session::flash('link_sosmed', $request->input('link_sosmed'));

        $request->validate([
            'nama' => 'required',
            'link_sosmed' => 'nullable',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        $ekskul = [
            'slug' => $slug,
            'nama' => strtoupper($request->input('nama')),
            'link_sosmed' => $request->input('link_sosmed'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg'] 
            ]);

            $file = $request->file('gambar');
            $gambar = $request->input('nama') . '.' . $file->extension();
            $file->move(public_path('storage/ekskul'), $gambar);

            $ekskul['gambar'] = '/storage/ekskul/' . $gambar;
        }

        try {
            Ekskul::create($ekskul);

            toast('Ekstrakurikuler berhasil dibuat!', 'success');

            return redirect()->route('ekskul.index');
        } catch (\Exception $e) {
            toast('Ekstrakurikuler gagal dibuat.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ekskul $ekskul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ekskul $ekskul)
    {
        return view('dashboard.ekskul.edit')->with([
            'title' => 'Edit Ekstrakurikuler',
            'active' => 'Kesiswaan',
            'subActive' => 'Ekstrakurikuler',
            'ekskul' => $ekskul,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ekskul $ekskul)
    {
        $request->validate([
            'nama' => 'required',
            'link_sosmed' => 'nullable',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        $updatedEkskul = [
            'slug' => $slug,
            'nama' => strtoupper($request->input('nama')),
            'link_sosmed' => $request->input('link_sosmed'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg'] 
            ]);

            $file = $request->file('gambar');
            $gambar = $request->input('nama') . '.' . $file->extension();
            $file->move(public_path('storage/ekskul'), $gambar);

            if (!str_contains($ekskul->gambar, 'no-image-11.png')) {
                File::delete(public_path($ekskul->gambar));
            }

            $updatedEkskul['gambar'] = '/storage/ekskul/' . $gambar;
        }
        
        try {
            $ekskul->update($updatedEkskul);
    
            toast('Ekstrakurikuler berhasil diedit!', 'success');

            return redirect()->route('ekskul.index');
        } catch (\Exception $e) {
            toast('Ekstrakurikuler gagal diedit!', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ekskul $ekskul)
    {
        if (!str_contains($ekskul->gambar, 'no-image-11.png')) {
            File::delete(public_path($ekskul->gambar));
        }

        $ekskul->delete();

        toast('Ekstrakurikuler berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
