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

        $mading = [
            'title' => 'AGENDA SEKOLAH',
            'kategori' => 'agenda',
            'list' => Post::with('penulis')
                ->where(['kategori' => 'agenda', 'status' => '1'])
                ->latest()
                ->limit(4)
                ->get(),
        ];

        $konsentrasi = KonsentrasiKeahlian::orderBy('nama', 'asc')
            ->get();

        $prestasi = Prestasi::with('penulis')
            ->where('status', '1')
            ->latest();

        $kategoriPrestasi = [
            'internasional' => Prestasi::where('kategori', 'internasional')->where('status', '1')
                ->count(),
            'nasional' => Prestasi::where('kategori', 'nasional')->where('status', '1')
                ->count(),
            'provinsi' => Prestasi::where('kategori', 'provinsi')->where('status', '1')
                ->count(),
            'kota' => Prestasi::where('kategori', 'kota')->where('status', '1')
                ->count(),
        ];

        $pendidik = Pendidik::with('mapel')
            ->latest();

        $ekskul = Ekskul::orderBy('nama', 'asc')
            ->get();

        $agent = new Agent();

        if ($agent->isMobile() || $agent->isTablet()) {
            $berita = $berita->limit(2)
                ->get();

            $prestasi = $prestasi->limit(4)
                ->get();

            $pendidik = $pendidik->limit(6)
                ->get();
        } else {
            $berita = $berita->limit(3)
                ->get();

            $prestasi = $prestasi->limit(6)
                ->get();

            $pendidik = $pendidik->limit(8)
                ->get();
        }

        return Inertia::render('Home')
            ->with([
                'heroSection' => $this->heroSection,
                'sambutan' => $sambutan,
                'berita' => $berita,
                'mading' => $mading,
                'konsentrasi' => $konsentrasi,
                'prestasi' => $prestasi,
                'kategoriPrestasi' => $kategoriPrestasi,
                'tenagaPendidik' => $pendidik,
                'ekskul' => $ekskul,
            ]);
    }
}
