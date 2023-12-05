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

    public function show(KonsentrasiKeahlian $jurusan)
    {
        $jurusan = KonsentrasiKeahlian::with(['program', 'program.bidang'])
            ->where('slug', $jurusan->slug)
            ->first();

        return Inertia::render('DetailJurusan')->with(['jurusan' => $jurusan]);
    }
}
