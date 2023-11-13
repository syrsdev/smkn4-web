<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Pendidik;
use Illuminate\Http\Request;
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendidik $pendidik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendidik $pendidik)
    {
        //
    }
}
