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

        $subNavbar = SubNavbar::where('status', '1')->latest()->get();

        Inertia::share(['sekolah' => $sekolah, 'subNavbar' => $subNavbar]);
        View::share(['sekolah' => $sekolah]);

        return $next($request);
    }
}
