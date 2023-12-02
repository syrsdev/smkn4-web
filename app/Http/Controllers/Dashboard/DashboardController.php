<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KonsentrasiKeahlian;
use App\Models\Post;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function get()
    {
        return view('dashboard.dashboard')
            ->with([
                'title' => 'Dashboard',
                'active' => 'Dashboard',
                'subActive' => null,
            ]);
    }

    public function index()
    {
        $sumBox = [
            'post' => [
                'agenda' => Post::where(['kategori' => 'agenda','status' => 1])->count(),
                'artikel' => Post::where(['kategori' => 'artikel','status' => 1])->count(),
                'berita' => Post::where(['kategori' => 'berita','status' => 1])->count(),
                'event' => Post::where(['kategori' => 'event','status' => 1])->count(),
            ],
            'prestasi' => Prestasi::where('status', 1)->count(),
            'konsentrasi' => KonsentrasiKeahlian::count(),
        ];

        return view('dashboard.dashboard.dashboard')
            ->with([
                'title' => 'Dashboard',
                'active' => 'Dashboard',
                'subActive' => null,
                'sumBox' => $sumBox,
            ]);
    }
}
