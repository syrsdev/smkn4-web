<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Pendidik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class TenagaPendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Pendidik::with('mapel')
            ->orderBy('nama', 'asc')
            ->get();

        return view('dashboard.pendidik.index')
            ->with([
                'title' => 'Data Tenaga Pendidik',
                'active' => 'Guru',
                'subActive' => null,
                'guru' => $guru,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mapel = Mapel::orderBy('nama','asc')
            ->get();

        return view('dashboard.pendidik.create')
            ->with([
                'title' => 'Tambah Data Pendidik',
                'active' => 'Guru',
                'subActive' => null,
                'mapel' => $mapel,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->input('nama'));

        $request->validate([
            'nama'=> 'required',
            'bagian' => 'required',
            'sub_bagian' => 'required',
            'id_mapel' => 'required',
        ]);

        $guru = [
            'nama' => $request->input('nama'),
            'bagian' => $request->input('bagian'),
            'sub_bagian' => $request->input('sub_bagian'),
            'id_mapel' => $request->input('id_mapel'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg']
            ]);

            $file = $request->file('gambar');
            $gambar = $request->input('nama') . '.' . $file->extension();
            $file->move(public_path('storage/pendidik'), $gambar);

            $guru['gambar'] = $gambar;
        }

        try {
            Pendidik::create($guru);

            toast('Ekstrakurikuler berhasil dibuat!', 'success');

            return redirect()->route('ekskul.index');
        } catch (\Exception) {
            toast('Ekstrakurikuler gagal dibuat.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendidik $pendidik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendidik $pendidik)
    {
        $mapel = Mapel::orderBy('nama','asc')
            ->get();

        return view('dashboard.pendidik.create')
            ->with([
                'title' => 'Tambah Data Pendidik',
                'active' => 'Guru',
                'subActive' => null,
                'mapel' => $mapel,
                'guru' => $pendidik,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendidik $pendidik)
    {
        $request->validate([
            'nama'=> 'required',
            'bagian' => 'required',
            'sub_bagian' => 'required',
            'id_mapel' => 'required',
        ]);

        $guru = [
            'nama' => $request->input('nama'),
            'bagian' => $request->input('bagian'),
            'sub_bagian' => $request->input('sub_bagian'),
            'id_mapel' => $request->input('id_mapel'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg']
            ]);

            $file = $request->file('gambar');
            $gambar = $request->input('nama') . '.' . $file->extension();

            if ($pendidik->gambar !== 'no-image-34.png') {
                File::delete(public_path('storage/pendidik/' . $pendidik->gambar));
            }

            $file->move(public_path('storage/pendidik'), $gambar);

            $guru['gambar'] = $gambar;
        }

        try {
            $pendidik->update($guru);

            toast('Ekstrakurikuler berhasil diedit!', 'success');

            return redirect()->route('ekskul.index');
        } catch (\Exception) {
            toast('Ekstrakurikuler gagal diedit.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendidik $pendidik)
    {
        if ($pendidik->gambar !== 'no-image-34.png') {
            File::delete(public_path('storage/pendidik/' . $pendidik->gambar));
        }

        toast('Ekstrakurikuler berhasil dihapus.', 'success');
        
        return redirect()->back();
    }
}
