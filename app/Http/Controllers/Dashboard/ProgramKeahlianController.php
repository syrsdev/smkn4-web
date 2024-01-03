<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BidangKeahlian;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $program = ProgramKeahlian::with('bidang')
            ->withCount('konsentrasi')
            ->orderBy('nama', 'asc')
            ->get();

        $bidang = BidangKeahlian::orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Program Keahlian?');

        return view('dashboard.jurusan.program.index')
            ->with([
                'title' => 'Program Keahlian',
                'active' => 'Jurusan',
                'subActive' => 'Program',
                'program' => $program,
                'bidang' => $bidang,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_bidang' => 'required',
        ]);

        try {
            ProgramKeahlian::create([
                'slug' => Str::slug($request->input('nama')),
                'nama' => $request->input('nama'),
                'id_bidang' => $request->input('id_bidang'),
            ]);

            toast('Program Keahlian berhasil dibuat!', 'success');
        } catch (\Exception $e) {
            toast('Program Keahlian gagal dibuat!', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgramKeahlian $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramKeahlian $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramKeahlian $program)
    {
        $request->validate([
            'nama' => 'required',
            'id_bidang' => 'required',
        ]);

        $slug = Str::slug($request->input('nama'));

        try {
            $program->update([
                'slug' => Str::slug($request->input('nama')),
                'nama' => $request->input('nama'),
                'id_bidang' => $request->input('id_bidang'),
            ]);

            toast('Program Keahlian berhasil diedit!', 'success');
        } catch (\Exception $e) {
            toast('Program Keahlian gagal diedit!', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramKeahlian $program)
    {
        $program->delete();

        toast('Program Keahlian berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
