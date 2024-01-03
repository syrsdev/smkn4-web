<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BidangKeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BidangKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bidang = BidangKeahlian::withCount('program')
            ->orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Bidang Keahlian?');

        return view('dashboard.jurusan.bidang.index')
            ->with([
                'title' => 'Bidang Keahlian',
                'active' => 'Jurusan',
                'subActive' => 'Bidang',
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
        ]);

        try {
            BidangKeahlian::create([
                'slug' => Str::slug($request->input('nama')),
                'nama' => $request->input('nama'),
            ]);

            toast('Bidang Keahlian berhasil dibuat!', 'success');
        } catch (\Exception $e) {
            toast('Bidang Keahlian gagal dibuat!', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(BidangKeahlian $bidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BidangKeahlian $bidang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BidangKeahlian $bidang)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        try {
            $bidang->update([
                'slug' => Str::slug($request->input('nama')),
                'nama' => $request->input('nama'),
            ]);

            toast('Bidang Keahlian berhasil diedit!', 'success');
        } catch (\Exception $e) {
            toast('Bidang Keahlian gagal diedit!', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BidangKeahlian $bidang)
    {
        $bidang->delete();

        toast('Bidang Keahlian berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
