<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KonsentrasiKeahlian;
use App\Models\Pendidik;
use App\Models\Post;
use App\Models\Prestasi;

class DashboardController extends Controller
{
    public function index()
    {
        $sumBox = [
            'post' => [
                'agenda' => Post::where('kategori', 'agenda')->count(),
                'artikel' => Post::where('kategori', 'artikel')->count(),
                'berita' => Post::where('kategori', 'berita')->count(),
                'event' => Post::where('kategori', 'event')->count(),
            ],
            'prestasi' => Prestasi::count(),
            'konsentrasi' => KonsentrasiKeahlian::count(),
        ];

        $post = [
            'latest' => Post::with('penulis')
                ->latest()
                ->limit(10)
                ->get(),
            'table' => Post::with('penulis')
                ->latest()
                ->limit(5)
                ->get(),
        ];

        $jurusan = KonsentrasiKeahlian::with(['program', 'program.bidang'])
            ->orderBy('nama', 'asc')
            ->get();

        $guru = [
            'pendidik' => Pendidik::where('bagian', 'pendidik')
                ->limit(3)
                ->get(),
            'kependidikan' => Pendidik::where('bagian', 'kependidikan')
                ->limit(3)
                ->get(),
        ];

        $donut = [
            'post' => Post::sum('views'),
            'prestasi' => Prestasi::sum('views'),
        ];

        return view('dashboard.dashboard.dashboard')
            ->with([
                'title' => 'Dashboard',
                'active' => 'Dashboard',
                'subActive' => null,
                'sumBox' => $sumBox,
                'post' => $post,
                'jurusan' => $jurusan,
                'guru' => $guru,
                'donut' => $donut,
            ]);
    }


    public function statistic()
    {
        $postDates = Post::selectRaw('DATE(created_at) as date')
            ->orderBy('date', 'asc')
            ->groupBy('date')
            ->get()
            ->pluck('date');

        $prestasiDates = Prestasi::selectRaw('DATE(created_at) as date')
            ->orderBy('date', 'asc')
            ->groupBy('date')
            ->get()
            ->pluck('date');

        $allDates = $postDates->merge($prestasiDates)->unique();

        $statistics = [];

        foreach ($allDates as $date) {
            $statistics[] = [
                'date' => $date,
                'post' => Post::whereDate('created_at', $date)->count(),
                'prestasi' => Prestasi::whereDate('created_at', $date)->count(),
            ];
        }

        return response()->json($statistics);
    }
}
