@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">

    <style>
        .tox-promotion {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('prestasi.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }} Baru</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Kesiswaan</div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }} Baru</h2>
                <p class="section-lead">
                    Di halaman ini Anda {{ $title }}.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tulis Prestasi</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('prestasi.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_penulis" value="{{ Auth::id() }}">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="judul" value="{{ Session::get('judul') }}" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="kategori">
                                                <option disabled selected>Kategori</option>
                                                <option value="kota">Tingkat Kota</option>
                                                <option value="provinsi">Tingkat Provinsi</option>
                                                <option value="nasional">Tingkat Nasional</option>
                                                <option value="internasional">Tingkat Internasional</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konten</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="form-control" name="konten">{{ Session::get('konten') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pemenang</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="pemenang" value="{{ Session::get('pemenang') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Pilih File</label>
                                                <input type="file" class="form-control" name="gambar" id="image-upload">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('assets/modules/tinymce/tinymce.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-tinymce.js') }}"></script>
@endsection
