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
                            <div class="card-header-action dropdown">
                                <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Kategori</a>
                                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    {{-- <li class="dropdown-title">Guru dan Staff</li> --}}
                                    <li><a href="#agenda" class="dropdown-item">Agenda</a></li>
                                    <li><a href="#artikel" class="dropdown-item">Artikel</a></li>
                                    <li><a href="#berita" class="dropdown-item">Berita</a></li>
                                    <li><a href="#event" class="dropdown-item">Event</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body" id="top-5-scroll">
                            <div class="tab-pane fade show active" id="agenda" role="tabpanel">
                                <ul class="list-unstyled list-unstyled-border">
                                    @foreach ($post['agenda'] as $item)
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
                            <div class="tab-pane fade" id="artikel" role="tabpanel">
                                <ul class="list-unstyled list-unstyled-border">
                                    @foreach ($post['artikel'] as $item)
                                        <li class="media">
                                            <img class="mr-3 rounded" width="55" src="{{ asset($item->gambar) }}"
                                                alt="{{ $item->judul }}">
                                            <div class="media-body">
                                                <div class="float-right">
                                                    <div class="font-weight-600 text-muted text-small">
                                                        {{ $item->kategori }}
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
                            <div class="tab-pane fade" id="berita" role="tabpanel">
                                <ul class="list-unstyled list-unstyled-border">
                                    @foreach ($post['berita'] as $item)
                                        <li class="media">
                                            <img class="mr-3 rounded" width="55" src="{{ asset($item->gambar) }}"
                                                alt="{{ $item->judul }}">
                                            <div class="media-body">
                                                <div class="float-right">
                                                    <div class="font-weight-600 text-muted text-small">
                                                        {{ $item->kategori }}
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
                            <div class="tab-pane fade" id="event" role="tabpanel">
                                <ul class="list-unstyled list-unstyled-border">
                                    @foreach ($post['event'] as $item)
                                        <li class="media">
                                            <img class="mr-3 rounded" width="55" src="{{ asset($item->gambar) }}"
                                                alt="{{ $item->judul }}">
                                            <div class="media-body">
                                                <div class="float-right">
                                                    <div class="font-weight-600 text-muted text-small">
                                                        {{ $item->kategori }}
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
                            <h4>Best Products</h4>
                        </div>
                        <div class="card-body">
                            <div class="owl-carousel owl-theme" id="products-carousel">
                                <div>
                                    <div class="product-item pb-3">
                                        <div class="product-image">
                                            <img alt="image" src="{{ asset('assets/img/products/product-4-50.png') }}"
                                                class="img-fluid">
                                        </div>
                                        <div class="product-details">
                                            <div class="product-name">iBook Pro 2018</div>
                                            <div class="product-review">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="text-muted text-small">67 Sales</div>
                                            <div class="product-cta">
                                                <a href="#" class="btn btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="product-item">
                                        <div class="product-image">
                                            <img alt="image" src="{{ asset('assets/img/products/product-3-50.png') }}"
                                                class="img-fluid">
                                        </div>
                                        <div class="product-details">
                                            <div class="product-name">oPhone S9 Limited</div>
                                            <div class="product-review">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half"></i>
                                            </div>
                                            <div class="text-muted text-small">86 Sales</div>
                                            <div class="product-cta">
                                                <a href="#" class="btn btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="product-item">
                                        <div class="product-image">
                                            <img alt="image" src="{{ asset('assets/img/products/product-1-50.png') }}"
                                                class="img-fluid">
                                        </div>
                                        <div class="product-details">
                                            <div class="product-name">Headphone Blitz</div>
                                            <div class="product-review">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <div class="text-muted text-small">63 Sales</div>
                                            <div class="product-cta">
                                                <a href="#" class="btn btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>TTenaga Pendidik dan Keteneganakerjaan</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-title mb-2">Guru</div>
                                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                        <li class="media">
                                            <img class="img-fluid mt-1 img-shadow"
                                                src="{{ asset('assets/modules/flag-icon-css/flags/4x3/id.svg') }}"
                                                alt="image" width="40">
                                            <div class="media-body ml-3">
                                                <div class="media-title">Nama Guru</div>
                                                <div class="text-small text-muted">Mapel</div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="img-fluid mt-1 img-shadow"
                                                src="{{ asset('assets/modules/flag-icon-css/flags/4x3/id.svg') }}"
                                                alt="image" width="40">
                                            <div class="media-body ml-3">
                                                <div class="media-title">Nama Guru</div>
                                                <div class="text-small text-muted">Mapel</div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="img-fluid mt-1 img-shadow"
                                                src="{{ asset('assets/modules/flag-icon-css/flags/4x3/id.svg') }}"
                                                alt="image" width="40">
                                            <div class="media-body ml-3">
                                                <div class="media-title">Nama Guru</div>
                                                <div class="text-small text-muted">Mapel</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 mt-sm-0 mt-4">
                                    <div class="text-title mb-2">Staff</div>
                                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                        <li class="media">
                                            <img class="img-fluid mt-1 img-shadow"
                                                src="{{ asset('assets/modules/flag-icon-css/flags/4x3/id.svg') }}"
                                                alt="image" width="40">
                                            <div class="media-body ml-3">
                                                <div class="media-title">Nama Staff</div>
                                                {{-- <div class="text-small text-muted">3,486</div> --}}
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="img-fluid mt-1 img-shadow"
                                                src="{{ asset('assets/modules/flag-icon-css/flags/4x3/id.svg') }}"
                                                alt="image" width="40">
                                            <div class="media-body ml-3">
                                                <div class="media-title">Nama Staff</div>
                                                {{-- <div class="text-small text-muted">3,486</div> --}}
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="img-fluid mt-1 img-shadow"
                                                src="{{ asset('assets/modules/flag-icon-css/flags/4x3/id.svg') }}"
                                                alt="image" width="40">
                                            <div class="media-body ml-3">
                                                <div class="media-title">Nama Staff</div>
                                                {{-- <div class="text-small text-muted">3,486</div> --}}
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Post</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-danger">Selengkapnya<i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">INV-87239</a></td>
                                            <td>Admin Template</td>
                                            <td class="font-weight-600">Kusnadi</td>
                                            <td>July 19, 2018</td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Detail</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
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
