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
                @include('dashboard.dashboard.partials.statistic')
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
                @include('dashboard.dashboard.partials.donut')
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>

    <!-- Page Specific js File -->
    @include('dashboard.dashboard.partials.statistic-script')
    @include('dashboard.dashboard.partials.jurusan-script')
    @include('dashboard.dashboard.partials.donut-script')
@endsection
