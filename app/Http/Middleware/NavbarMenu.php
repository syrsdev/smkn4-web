<?php

namespace App\Http\Middleware;

use App\Models\Post;
use App\Models\Prestasi;
use App\Models\Sekolah;
use App\Models\SubNavbar;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class NavbarMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sekolah = Sekolah::all()
            ->pluck('value', 'key')
            ->toArray();

        $navMenu = [
            'berita' => [
                'artikel' => Post::where(['kategori' => 'artikel', 'status' => '1'])
                    ->latest()
                    ->first(),
                'berita' => Post::where(['kategori' => 'berita', 'status' => '1'])
                    ->latest()
                    ->first(),
                'event' => Post::where(['kategori' => 'event', 'status' => '1'])
                    ->latest()
                    ->first(),
            ],
            'kesiswaan' => [
                'prestasi' => Prestasi::where('status', '1')
                    ->latest()
                    ->first(),
            ],
        ];

        $subNavbar = SubNavbar::where('status', '1')->latest()->get();

        Inertia::share(['sekolah' => $sekolah, 'navMenu' => $navMenu, 'subNavbar' => $subNavbar]);
        View::share(['sekolah' => $sekolah]);

        return $next($request);
    }
}
