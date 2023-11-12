<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\HeroSection;
use App\Models\KonsentrasiKeahlian;
use App\Models\Pendidik;
use App\Models\Post;
use App\Models\Prestasi;
use App\Models\Sambutan;
use App\Models\Sekolah;
use Inertia\Inertia;
use Jenssegers\Agent\Agent;

class LandingPageController extends Controller
{
    protected $heroSection;

    public function __construct()
    {
        $this->heroSection = HeroSection::all()
            ->pluck('value', 'key')
            ->toArray();
    }

    public function index()
    {
        $sambutan = Sambutan::with('kepsek')
            ->first();

        $berita = Post::with('penulis')
            ->where(['kategori' => 'berita', 'status' => '1'])
            ->latest();

        $agenda = Post::with('penulis')
            ->where(['kategori' => 'agenda', 'status' => '1'])
            ->latest()
            ->limit(4)
            ->get();

        $konsentrasi = KonsentrasiKeahlian::get();

        $prestasi = Prestasi::where('status', '1')
            ->latest();

        $kategoriPrestasi = [
            'internasional' => Prestasi::where('kategori', 'internasional')
                ->count(),
            'nasional' => Prestasi::where('kategori', 'nasional')
                ->count(),
            'provinsi' => Prestasi::where('kategori', 'provinsi')
                ->count(),
            'kota' => Prestasi::where('kategori', 'kota')
                ->count(),
        ];

        $pendidik = Pendidik::with('mapel')
            ->latest()
            ->get();

        $ekskul = Ekskul::orderBy('nama', 'asc')
            ->get();

        $agent = new Agent();

        if ($agent->isMobile() || $agent->isTablet()) { 
            $berita = $berita->limit(4)
                ->get();

            $prestasi = $prestasi->limit(4)
                ->get();
        } else {
            $berita = $berita->limit(3)
                ->get();

            $prestasi = $prestasi->limit(6)
                ->get();
        }

        return Inertia::render('Home')
            ->with([
                'heroSection' => $this->heroSection,
                'sambutan' => $sambutan,
                'berita' => $berita,
                'agenda' => $agenda,
                'konsentrasi' => $konsentrasi,
                'prestasi' => $prestasi,
                'kategoriPrestasi' => $kategoriPrestasi,
                'tenagaPendidik' => $pendidik,
                'ekskul' => $ekskul,
            ]);
    }
}
