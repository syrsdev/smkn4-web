<?php

namespace App\Http\Controllers;

use App\Models\KonsentrasiKeahlian;
use App\Models\Post;
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
        $konsentrasi->load(['program', 'program.bidang', 'galeri']);

        $jurusan = KonsentrasiKeahlian::with(['program', 'program.bidang'])
            ->where('slug', '!=', $konsentrasi->slug)
            ->orderBy('nama', 'asc')
            ->get();

        $mading = [
            'title' => 'BERITA SEKOLAH',
            'kategori' => 'berita',
            'list' => Post::with('penulis')
                ->where(['kategori' => 'berita', 'status' => '1'])
                ->latest()
                ->limit(4)
                ->get(),
        ];

        return Inertia::render('DetailJurusan')->with([
            'konsentrasi' => $konsentrasi,
            'jurusan' => $jurusan,
            'mading' => $mading,
        ]);    
    }
}
