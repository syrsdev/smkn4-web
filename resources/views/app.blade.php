<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="overflow-x: hidden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="SMKN 4 Kota Tangerang adalah sekolah menengah kejuruan negeri yang berlokasi di Kota Tangerang, Banten. Didirikan pada tahun 1980, sekolah ini memiliki fokus pada pendidikan vokasi dan menawarkan berbagai jurusan yang relevan dengan kebutuhan industri">
    <meta name="keywords"
        content="Sekolah, SMK, smk, negeri, 4, tangerang, tng, sekolah, smkn, SMKN, SMK Negeri 4 Tangerang, Sekolah SMK Negeri, Kota Tangerang">
    <meta name="author" content="KuliKoding04">
    <meta name="robots" content="index, follow">
    <!-- untuk mengizinkan mesin pencari untuk mengindeks dan mengikuti tautan -->
    <meta name="googlebot" content="index, follow">
    <!-- untuk mengizinkan Google untuk mengindeks dan mengikuti tautan -->
    <meta name="referrer" content="no-referrer-when-downgrade">
    <!-- untuk mengontrol bagaimana referrer diatur saat mengklik tautan ke situs Anda -->
    <meta property="og:title" content="SMK NEGERI 4 TANGERANG">
    <meta property="og:description"
        content="SMKN 4 Kota Tangerang adalah sekolah menengah kejuruan negeri yang berlokasi di Kota Tangerang, Banten. Didirikan pada tahun 1980, sekolah ini memiliki fokus pada pendidikan vokasi dan menawarkan berbagai jurusan yang relevan dengan kebutuhan industri">
    {{-- <meta property="og:image" content="URL gambar untuk ditampilkan ketika halaman dibagikan di media sosial."> --}}
    <meta property="og:url" content="https://smkn4-tng.sch.id/">
    <meta property="og:type" content="website"> <!-- jenis konten, bisa juga artikel, produk, dll. -->
    <meta name="twitter:card" content="summary_large_image">
    <!-- tipe kartu Twitter yang akan digunakan saat tautan halaman Anda dibagikan -->
    <meta name="twitter:title" content="SMK NEGERI 4 TANGERANG">
    <meta name="twitter:description"
        content="SMKN 4 Kota Tangerang adalah sekolah menengah kejuruan negeri yang berlokasi di Kota Tangerang, Banten. Didirikan pada tahun 1980, sekolah ini memiliki fokus pada pendidikan vokasi dan menawarkan berbagai jurusan yang relevan dengan kebutuhan industri">
    {{-- <meta name="twitter:image" content="URL gambar untuk ditampilkan ketika halaman dibagikan di Twitter."> --}}

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
