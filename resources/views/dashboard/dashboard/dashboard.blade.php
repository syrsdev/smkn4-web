@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
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
                            <canvas id="postPrestasi" height="160"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card gradient-bottom">
                        <div class="card-header">
                            <h4>Post Terbaru</h4>
                            <div class="card-header-action dropdown">
                                <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Kategori</a>
                                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <li class="dropdown-title">Guru dan Staff</li>
                                    @foreach ($post as $item)
                                    <li><a href="#" class="dropdown-item">Kategori</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card-body" id="top-5-scroll">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($post as $item)
                                    <a href="{{ route('post.show', $item->slug) }}">
                                        <li class="media">
                                            <img class="mr-3 rounded" width="55" src="{{ asset($item->gambar) }}"
                                                alt="{{ $item->judul }}">
                                            <div class="media-body">
                                                <div class="float-right">
                                                    <div class="font-weight-600 text-muted text-small">{{ ucfirst($item->kategori) }}
                                                    </div>
                                                </div>
                                                <div class="media-title">{{ $item->judul }}</div>
                                                <div class="media-title">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</div>
                                            </div>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer pt-3 d-flex justify-content-center">
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-primary" data-width="20"></div>
                                <div class="budget-price-label">Total Post</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.') }}"></script>
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific js File -->
    @include('dashboard.dashboard.partials.statistic')
@endsection
