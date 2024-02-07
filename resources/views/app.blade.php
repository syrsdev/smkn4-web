<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="overflow-x: hidden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'SMKN 4 Kota Tangerang') }}</title>
    <style>
        .paginasi {
            color: {{ $page['props']['sekolah']['font_sekunder'] }};
            background-color: {{ $page['props']['sekolah']['warna_primer'] }};
            border-color: {{ $page['props']['sekolah']['warna_aksen'] }};
        }

        .paginasi-false:hover {
            color: {{ $page['props']['sekolah']['warna_aksen'] }};
        }

        .splide__arrow {
            background: {{ $page['props']['sekolah']['warna_primer'] }} !important;
            opacity: 100% !important;
            border: solid !important;
            border-width: 2px !important;
            border-color: {{ $page['props']['sekolah']['warna_aksen'] }} !important;
        }

        .btn-primer {
            color: {{ $page['props']['sekolah']['font_sekunder'] }};
            background-color: {{ $page['props']['sekolah']['warna_primer'] }};
        }

        .btn-primer:hover {
            color: {{ $page['props']['sekolah']['font_primer'] }};
        }

        .btn-primer::before {
            background-color: {{ $page['props']['sekolah']['warna_aksen'] }};
        }

        .hover-link::before {
            background-color: {{ $page['props']['sekolah']['warna_aksen'] }};
            content: "";
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 2px;
            transform: scaleX(0);
            transition: transform 0.3s;
        }

        .border-primer {
            border-color: {{ $page['props']['sekolah']['warna_primer'] }};
        }

        .border-aksen {
            border-color: {{ $page['props']['sekolah']['warna_aksen'] }};
        }

        .bg-primer {
            background-color: {{ $page['props']['sekolah']['warna_primer'] }};
        }

        .bg-aksen {
            background-color: {{ $page['props']['sekolah']['warna_aksen'] }};
        }

        .btn-aksen {
            color: {{ $page['props']['sekolah']['font_sekunder'] }};
        }

        .group:hover .btn-aksen {
            color: {{ $page['props']['sekolah']['font_primer'] }};
        }

        .btn-aksen-sec {
            color: {{ $page['props']['sekolah']['font_primer'] }};
        }

        .group:hover .btn-aksen-sec {
            color: {{ $page['props']['sekolah']['font_sekunder'] }};
        }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @routes
    @viteReactRefresh
    @vite(['resources/js/app.jsx', "resources/js/Pages/{$page['component']}.jsx"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @include('sweetalert::alert')
    @inertia
</body>

</html>
