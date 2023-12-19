@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>
            {{-- SumBox --}}
            @include('dashboard.dashboard.partials.sumbox')
            <div class="row">
                {{-- Statistic --}}
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistik Post & Prestasi</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="postPrestasiStat" height="130"></canvas>
                        </div>
                    </div>
                </div>
                {{-- Latest Post --}}
                @include('dashboard.dashboard.partials.latest-post')
            </div>
            <div class="row">
                {{-- Jurusan --}}
                @include('dashboard.dashboard.partials.jurusan')
                {{-- Tenaga Pendidik --}}
                @include('dashboard.dashboard.partials.pendidik')
            </div>
            <div class="row">
                {{-- Post Table --}}
                @include('dashboard.dashboard.partials.table-post')
                {{-- Donut Chart --}}
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Total Views</h4>
                        </div>
                        <div class="card-body">
                            @if ($donut['post'] + $donut['prestasi'] > 0)
                                <canvas id="postPrestasiDonut" height="230"></canvas>
                            @else
                                <p class="text-center">Belum ada data.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>

    <!-- Page Specific js File -->
    @include('dashboard.dashboard.partials.statistic')
    @include('dashboard.dashboard.partials.donut')
    @include('dashboard.dashboard.partials.jurusan-script')
@endsection
