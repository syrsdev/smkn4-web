<?php

namespace App\Http\Middleware;

use App\Models\Sekolah;
use App\Models\SocialMedia;
use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class FooterContent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $footer = [
            'socialMedia' => SocialMedia::whereNotNull('url')
                ->get(),
        ];

        Inertia::share(['footer' => $footer]);

        return $next($request);
    }
}
