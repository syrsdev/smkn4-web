<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KonsentrasiKeahlian;
use App\Models\Pendidik;
use App\Models\Post;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function get()
    {
        $post = [
            'agenda' => Post::where('kategori', 'agenda')->paginate(5),
            'artikel' => Post::where('kategori', 'artikel')->paginate(5),
            'berita' => Post::where('kategori', 'berita')->paginate(5),
            'event' => Post::where('kategori', 'event')->paginate(5),
        ];

        $guru = [
            'pendidik' => Pendidik::where('bagian', 'pendidik')
            ->limit(3)
            ->get(),
            'pegawai' => Pendidik::where('bagian', 'pegawai')
            ->limit(3)
            ->get(),
        ];

        $table_post = DB::table('post')
            ->select('slug', 'judul', 'gambar', 'created_at', 'kategori', 'id_penulis')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard.dashboard')
            ->with([
                'title' => 'Dashboard',
                'active' => 'Dashboard',
                'subActive' => null,
                'post' => $post,
                'guru' => $guru,
                'table_post' => $table_post,
            ]);
    }

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
