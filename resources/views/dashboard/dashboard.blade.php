@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-archive"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Agenda</h4>
                            </div>
                            <div class="card-body"> 59</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Artikel</h4>
                            </div>
                            <div class="card-body">
                                59
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fa fa-newspaper-o"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Berita</h4>
                            </div>
                            <div class="card-body">
                                59
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Event</h4>
                            </div>
                            <div class="card-body">
                                59
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistik Post Dilihat</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="182"></canvas>
                            <div class="statistic-details mt-sm-4"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card gradient-bottom">
                        <div class="card-header">
                            <h4>Post Terbaru</h4>
                        </div>
                        <div class="card-body" id="top-5-scroll">
                            <div class="tab-pane fade show active" id="agenda" role="tabpanel">
                                <ul class="list-unstyled list-unstyled-border">
                                    @foreach ($recentPost as $item)
                                        <li class="media">
                                            <img class="mr-3 rounded" width="55" src="{{ asset($item->gambar) }}"
                                                alt="{{ $item->judul }}">
                                            <div class="media-body">
                                                <div class="float-right">
                                                    <div class="font-weight-600 text-muted text-small">{{ $item->kategori }}
                                                    </div>
                                                </div>
                                                <div class="media-title">{{ $item->judul }}</div>
                                                <div class="media-title">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Konsentrasi Keahlian</h4>
                        </div>
                        <div class="card-body">
                            <div class="owl-carousel owl-theme" id="products-carousel">
                                @foreach ($konsentrasi as $item)
                                <div>
                                    <div class="product-item pb-3">
                                        <div class="product-image">
                                            <img alt="{{$item->nama}}" src="{{ asset($item->image) }}"
                                                class="img-fluid">
                                        </div>
                                        <div class="product-details">
                                            <div class="product-name">{{$item->nama}}</div>
                                            <div class="product-review">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="text-muted text-small">{{ $item->deskripsi }}</div>
                                            <div class="product-cta">
                                                <a href="{{ route('konsentrasi.show', $item->slug) }}" class="btn btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tenaga Pendidik dan Kepegawaian</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-title mb-2">Tenaga Pendidik</div>
                                    @foreach ($guru['pendidik'] as $item)
                                        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                            <li class="media">
                                                <img class="img-fluid mt-1 img-shadow" src="{{ $item->gambar }}"
                                                    alt="{{ $item->nama }}" width="40">
                                                <div class="media-body ml-3">
                                                    <div class="media-title">{{ $item->nama }}</div>
                                                    <div class="text-small text-muted">Guru Produktif</div>
                                                </div>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                                <div class="col-sm-6 mt-sm-0 mt-4">
                                    <div class="text-title mb-2">Tenaga Kepegawaian</div>
                                    @foreach ($guru['kependidikan'] as $item)
                                        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                            <li class="media">
                                                <img class="img-fluid mt-1 img-shadow" src="{{ $item->gambar }}"
                                                    alt="{{ $item->nama }}" width="40">
                                                <div class="media-body ml-3">
                                                    <div class="media-title">{{ $item->nama }}</div>
                                                    <div class="text-small text-muted">Staff Kurikulum</div>
                                                </div>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Post</h4>
                            {{-- <div class="card-header-action">
                                <a href="#" class="btn btn-danger">Selengkapnya<i
                                        class="fas fa-chevron-right"></i></a>
                            </div> --}}
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            {{-- <th>#</th> --}}
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Penulis</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tablePost as $item)
                                            <tr>
                                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ ucFirst($item->kategori) }}</td>
                                                <td class="font-weight-600">{{ $item->penulis->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('post.show', $item->slug) }}"
                                                        class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="card card-hero">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="far fa-question-circle"></i>
                            </div>
                            <h4>14</h4>
                            <div class="card-description">Customers need help</div>
                        </div>
                        <div class="card-body p-0">
                            <div class="tickets-list">
                                <a href="#" class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>My order hasn't arrived yet</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div>Laila Tazkiah</div>
                                        <div class="bullet"></div>
                                        <div class="text-primary">1 min ago</div>
                                    </div>
                                </a>
                                <a href="#" class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>Please cancel my order</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div>Rizal Fakhri</div>
                                        <div class="bullet"></div>
                                        <div>2 hours ago</div>
                                    </div>
                                </a>
                                <a href="#" class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>Do you see my mother?</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div>Syahdan Ubaidillah</div>
                                        <div class="bullet"></div>
                                        <div>6 hours ago</div>
                                    </div>
                                </a>
                                <a href="features-tickets.html" class="ticket-item ticket-more">
                                    View All <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
    <script src="assets/js/page/index.js"></script>
@endsection
