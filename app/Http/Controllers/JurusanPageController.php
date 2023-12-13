<?php

namespace App\Http\Controllers;

use App\Models\KonsentrasiKeahlian;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JurusanPageController extends Controller
{
    public function index()
    {
        $jurusan = KonsentrasiKeahlian::with(['program', 'program.bidang'])
            ->orderBy('nama', 'asc')
            ->get();

        return Inertia::render('Jurusan')->with(['jurusan' => $jurusan]);
    }

    public function show(KonsentrasiKeahlian $konsentrasi)
    {
        $konsentrasi = KonsentrasiKeahlian::with(['program', 'program.bidang', 'galeri'])
            ->where('slug', $konsentrasi->slug)
            ->first();

        $jurusan = KonsentrasiKeahlian::with(['program', 'program.bidang'])
            ->where('slug', '!=', $konsentrasi->slug)
            ->get();

        return Inertia::render('DetailJurusan')->with([
            'konsentrasi' => $konsentrasi,
            'jurusan' => $jurusan,
        ]);    
    }
}
