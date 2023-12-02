@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
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
              <div class="card-body">
                59
              </div>
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
                  <div class="statistic-details mt-sm-4">
                  </div>
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
                  <li class="dropdown-title">Guruf dan Staff</li>
                  <li><a href="#" class="dropdown-item">Agenda</a></li>
                  <li><a href="#" class="dropdown-item">Artikel</a></li>
                  <li><a href="#" class="dropdown-item">Berita</a></li>
                  <li><a href="#" class="dropdown-item">Event</a></li>
                </ul>
              </div>
            </div>
            <div class="card-body" id="top-5-scroll">
              <ul class="list-unstyled list-unstyled-border">
                <li class="media">
                  <img class="mr-3 rounded" width="55" src="assets/img/products/product-3-50.png" alt="product">
                  <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small">Event</div></div>
                    <div class="media-title">Hari Lahir Pancasila</div>
                    <div class="media-title">1 Juni 2023</div>
                  </div>
                </li>
                <li class="media">
                  <img class="mr-3 rounded" width="55" src="assets/img/products/product-3-50.png" alt="product">
                  <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small">Agenda</div></div>
                    <div class="media-title">Penerimaan murid baru 2022/2023</div>
                    <div class="media-title">20 Maret 2025</div>
                  </div>
                </li>
                <li class="media">
                  <img class="mr-3 rounded" width="55" src="assets/img/products/product-3-50.png" alt="product">
                  <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small">Event</div></div>
                    <div class="media-title">Kegiata Perjusa X / XI</div>
                    <div class="media-title">25 April 2024</div>
                  </div>
                </li>
                <li class="media">
                  <img class="mr-3 rounded" width="55" src="assets/img/products/product-3-50.png" alt="product">
                  <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small">Event</div></div>
                    <div class="media-title">Kegiata Perjusa X / XI</div>
                    <div class="media-title">25 April 2024</div>
                  </div>
                </li>
                <li class="media">
                  <img class="mr-3 rounded" width="55" src="assets/img/products/product-3-50.png" alt="product">
                  <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small">Event</div></div>
                    <div class="media-title">Kegiata Perjusa X / XI</div>
                    <div class="media-title">25 April 2024</div>
                  </div>
                </li>
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
                      <img alt="image" src="assets/img/products/product-4-50.png" class="img-fluid">
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
                      <img alt="image" src="assets/img/products/product-3-50.png" class="img-fluid">
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
                      <img alt="image" src="assets/img/products/product-1-50.png" class="img-fluid">
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
              <h4>Tenaga Pendidik dan Ketenagakerjaan</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="text-title mb-2">Guru</div>
                  <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                    <li class="media">
                      <img class="img-fluid mt-1 img-shadow" src="assets/modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                      <div class="media-body ml-3">
                        <div class="media-title">Nama Guru</div>
                        <div class="text-small text-muted">Mata Pelajaran</div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="img-fluid mt-1 img-shadow" src="assets/modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                      <div class="media-body ml-3">
                        <div class="media-title">Nama Guru</div>
                        <div class="text-small text-muted">Mata Pelajaran</div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="img-fluid mt-1 img-shadow" src="assets/modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                      <div class="media-body ml-3">
                        <div class="media-title">Nama Guru</div>
                        <div class="text-small text-muted">Mata Pelajaran</div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="col-sm-6 mt-sm-0 mt-4">
                  <div class="text-title mb-2">Staff</div>
                  <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                    <li class="media">
                      <img class="img-fluid mt-1 img-shadow" src="assets/modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                      <div class="media-body ml-3">
                        <div class="media-title">Nama Staff</div>
                        <div class="text-small text-muted">3,486</div>
                      </div>
                    </li>
                  </ul>
                </div>
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
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/index.js') }}"></script>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.') }}"></script>
    <script src="{{ asset('assets/modules/popper.') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.') }}"></script>
    <script src="{{ asset('assets/js/stisla.') }}"></script>
    
    <!-- 'js Libraies -->
    <script src="{{ asset('assets/modules/simple-weather/jquery.simpleWeather.min.') }}"></script>
    <script src="{{ asset('assets/modules/chart.min.') }}"></script>
    <script src="{{ asset('assets/modules/jqvmap/dist/jquery.vmap.min.') }}"></script>
    <script src="{{ asset('assets/modules/jqvmap/dist/maps/jquery.vmap.world.') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.') }}"></script>
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.') }}"></script>

    <!-- Page Specific js File -->
    <script src="{{ asset('assets/js/page/index-0.') }}"></script>
    
    <!-- Template js File -->
    <script src="{{ asset('assets/js/scripts.') }}"></script>
    <script src="{{ asset('assets/js/custom.') }}"></script>
@endsection