<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\PendidikExport;
use App\Http\Controllers\Controller;
use App\Imports\PendidikImport;
use App\Models\Mapel;
use App\Models\Pendidik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
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
            
        confirmDelete('Hapus Tenaga Pendidik?', 'Yakin ingin hapus Data Tenaga Pendidik?');

        return view('dashboard.pendidik.index')
            ->with([
                'title'     => 'Data Tenaga Pendidik',
                'active'    => 'Guru',
                'subActive' => null,
                'guru'      => $guru,
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
                'title'     => 'Tambah Data Tenaga Pendidik',
                'active'    => 'Guru',
                'subActive' => null,
                'mapel'     => $mapel,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'       => ['required', 'string', 'unique:tenaga_pendidik,nama', 'max:255'],
            'bagian'     => ['required'],
            'mapel'      => ['nullable'],
        ]);

        $slug = Str::slug($request->input('nama'));

        $guru = [
            'slug'       => $slug,
            'nama'       => $request->input('nama'),
            'bagian'     => $request->input('bagian'),
        ];

        if ($request->input('bagian') === 'Pendidik') {
            $guru['sub_bagian'] = 'Guru';
            $guru['id_mapel'] = $request->input('mapel');
        } else if ($request->input('bagian' === 'Kependidikan')) {
            $guru['sub_bagian'] = 'Staff';
        }

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg,jpeg,gif,webp']
            ]);

            $file = $request->file('gambar');
            $gambar = $slug . '.' . $file->extension();
            $file->move(public_path('storage/pendidik'), $gambar);

            $guru['gambar'] = '/storage/pendidik/' . $gambar;
        }

        try {
            Pendidik::create($guru);

            toast('Data Tenaga Pendidik berhasil dibuat!', 'success');

            return redirect()->route('guru.index');
        } catch (\Exception $e) {
            toast('Data Tenaga Pendidik gagal dibuat.', 'warning');

            return redirect()->back();
        }
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
                'title'     => 'Edit Data Tenaga Pendidik',
                'active'    => 'Guru',
                'subActive' => null,
                'mapel'     => $mapel,
                'guru'      => $guru,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendidik $guru)
    {
        $request->validate([
            'nama'       => ['required', 'string', 'unique:tenaga_pendidik,nama,'.$guru->id, 'max:255'],
            'bagian'     => ['required'],
            'mapel'      => ['nullable'],
        ]);

        $slug = Str::slug($request->input('nama'));

        $updateGuru = [
            'slug'       => $slug,
            'nama'       => $request->input('nama'),
            'bagian'     => $request->input('bagian'),
        ];

        if ($request->input('bagian') === 'Pendidik') {
            $updateGuru['sub_bagian'] = 'Guru';
            $updateGuru['id_mapel'] = $request->input('mapel');
        } else if ($request->input('bagian' === 'Kependidikan')) {
            $updateGuru['sub_bagian'] = 'Staff';
            $updateGuru['id_mapel'] = null;
        }

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg,jpeg,gif,webp']
            ]);

            $file = $request->file('gambar');
            $gambar = $slug . '.' . $file->extension();

            if ($guru->gambar !== '/images/default/no-image-34.png') {
                File::delete(public_path($guru->gambar));
            }

            $file->move(public_path('storage/pendidik'), $gambar);
            $updateGuru['gambar'] = '/storage/pendidik/' . $gambar;
        }

        try {
            $guru->update($updateGuru);

            toast('Data Tenaga Pendidik berhasil diedit!', 'success');

            return redirect()->route('guru.index');
        } catch (\Exception $e) {
            toast('Data Tenaga Pendidik gagal diedit.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendidik $guru)
    {
        if ($guru->gambar !== '/images/default/no-image-34.png') {
            File::delete(public_path($guru->gambar));
        }

        $guru->delete();

        toast('Data Tenaga Pendidik berhasil dihapus.', 'success');
        
        return redirect()->back();
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:csv,xls,xlsx'],
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
