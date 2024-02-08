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
                            <div class="card-header-action">
                                <a href="#week" data-tab="summary-tab" class="btn active">Minggu ini</a>
                                <a href="#month" data-tab="summary-tab" class="btn">Bulan ini</a>
                                <a href="#all" data-tab="summary-tab" class="btn">Semua</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="summary">
                                <div class="summary-chart active" data-tab-group="summary-tab" id="week">
                                    <canvas id="weekStat" height="150"></canvas>
                                </div>
                                <div class="summary-chart" data-tab-group="summary-tab" id="month">
                                    <canvas id="monthStat" height="150"></canvas>
                                </div>
                                <div class="summary-chart" data-tab-group="summary-tab" id="all">
                                    <canvas id="allStat" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Trending Post --}}
                @include('dashboard.dashboard.partials.trending-post')
            </div>
            <div class="row">
                {{-- Jurusan --}}
                @include('dashboard.dashboard.partials.jurusan')
                {{-- Tenaga Pendidik --}}
                @include('dashboard.dashboard.partials.pendidik')
            </div>
            <div class="row">
                {{-- latest Table --}}
                @include('dashboard.dashboard.partials.latest-post')
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
