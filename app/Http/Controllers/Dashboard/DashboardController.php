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
            'trending' => Post::with('penulis')
                ->orderBy('views', 'desc')
                ->limit(3)
                ->get(),
            'latest' => Post::with('penulis')
                ->latest()
                ->limit(5)
                ->get(),
        ];

        $jurusan = KonsentrasiKeahlian::with(['program', 'program.bidang'])
            ->orderBy('nama', 'asc')
            ->get();

        $guru = [
            'pendidik' => Pendidik::where('bagian', 'Pendidik')
                ->limit(3)
                ->get(),
            'kependidikan' => Pendidik::whereIn('bagian', ['Kepala Sekolah', 'Kependidikan'])
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
        $post = [
            'all' => Post::selectRaw('DATE(created_at) as date')
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get()
                ->pluck('date'),
            'week' => Post::whereBetween('created_at', [now()->subDays(7), now()])
                ->selectRaw('DATE(created_at) as date')
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get()
                ->pluck('date'),
            'month' => Post::whereBetween('created_at', [now()->subDays(30), now()])
                ->selectRaw('DATE(created_at) as date')
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get()
                ->pluck('date'),
        ];

        $prestasi = [
            'all' => Prestasi::selectRaw('DATE(created_at) as date')
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get()
                ->pluck('date'),
            'week' => Prestasi::whereBetween('created_at', [now()->subDays(7), now()])
                ->selectRaw('DATE(created_at) as date')
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get()
                ->pluck('date'),
            'month' => Prestasi::whereBetween('created_at', [now()->subDays(30), now()])
                ->selectRaw('DATE(created_at) as date')
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get()
                ->pluck('date'),
        ];

        $dates = [
            'all' => collect(array_merge($post['all']->toArray(), $prestasi['all']->toArray()))
                ->unique()
                ->sort(),
            'week' => collect(array_merge($post['week']->toArray(), $prestasi['week']->toArray()))
                ->unique()
                ->sort(),
            'month' => collect(array_merge($post['month']->toArray(), $prestasi['month']->toArray()))
                ->unique()
                ->sort(),
        ];        

        $statistics = [];

        foreach ($dates['all'] as $date) {
            $statistics['all'][] = [
                'date' => $date,
                'post' => Post::whereDate('created_at', $date)->count(),
                'prestasi' => Prestasi::whereDate('created_at', $date)->count(),
            ];
        }

        foreach ($dates['week'] as $date) {
            $statistics['week'][] = [
                'date' => $date,
                'post' => Post::whereDate('created_at', $date)->count(),
                'prestasi' => Prestasi::whereDate('created_at', $date)->count(),
            ];
        }

        foreach ($dates['month'] as $date) {
            $statistics['month'][] = [
                'date' => $date,
                'post' => Post::whereDate('created_at', $date)->count(),
                'prestasi' => Prestasi::whereDate('created_at', $date)->count(),
            ];
        }

        return response()->json($statistics);
    }
}
