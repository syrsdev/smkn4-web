<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\PendidikExport;
use App\Http\Controllers\Controller;
use App\Imports\PendidikImport;
use App\Models\Mapel;
use App\Models\Pendidik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

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
            
        confirmDelete('Hapus Tenaga Pendidik?', 'Yakin ingin hapus Tenaga Pendidik?');

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
            'id_mapel' => 'nullable',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = rtrim(strtolower(str_replace(' ', '-', $nama)), '-');

        $guru = [
            'slug' => $slug,
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

            $guru['gambar'] = '/storage/pendidik/' . $gambar;
        }

        try {
            Pendidik::create($guru);

            toast('Tenaga Pendidik berhasil dibuat!', 'success');

            return redirect()->route('guru.index');
        } catch (\Exception) {
            toast('Tenaga Pendidik gagal dibuat.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendidik $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendidik $guru)
    {
        $mapel = Mapel::orderBy('nama', 'asc')
            ->get();

        return view('dashboard.pendidik.edit')
            ->with([
                'title' => 'Edit Data Pendidik',
                'active' => 'Guru',
                'subActive' => null,
                'mapel' => $mapel,
                'guru' => $guru,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendidik $guru)
    {
        $request->validate([
            'nama'=> 'required',
            'bagian' => 'required',
            'sub_bagian' => 'required',
            'id_mapel' => 'nullable',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = rtrim(strtolower(str_replace(' ', '-', $nama)), '-');

        $updateGuru = [
            'slug' => $slug,
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

            if (str_contains($guru->gambar, 'no-image-34.png')) {
                File::delete(public_path($guru->gambar));
            }

            $file->move(public_path('storage/pendidik'), $gambar);

            $updateGuru['gambar'] = '/storage/pendidik/' . $gambar;
        }

        try {
            $guru->update($updateGuru);

            toast('Tenaga Pendidik berhasil diedit!', 'success');

            return redirect()->route('guru.index');
        } catch (\Exception) {
            toast('Tenaga Pendidik gagal diedit.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendidik $guru)
    {
        if (str_contains($guru->gambar, 'no-image-34.png')) {
            File::delete(public_path($guru->gambar));
        }

        $guru->delete();

        toast('Tenaga Pendidik berhasil dihapus.', 'success');
        
        return redirect()->back();
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        try {
            Excel::import(new PendidikImport, $request->file('file'));
    
            toast('Data Tenaga Pendidik berhasil diimpor!', 'success');
        } catch(\Exception $e) {
            toast('Data Tenaga Pendidik gagal diimpor.', 'warning');
        }

        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new PendidikExport, 'Data Tenaga Pendidik.xlsx');
    }
}
