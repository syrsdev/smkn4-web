@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/chocolat/dist/css/chocolat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('konsentrasi.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Jurusan</div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('konsentrasi.index') }}">Konsentrasi Keahlian</a>
                    </div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">This page is just an example for you to create your own page.</p>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="tickets">
                                    <div class="ticket-content col-12">
                                        <div class="ticket-header">
                                            <div class="ticket-sender-picture img-shadow">
                                                <img src="{{ asset($konsentrasi->icon) }}" alt="{{ $konsentrasi->nama }}">
                                            </div>
                                            <div class="ticket-detail">
                                                <div class="ticket-title">
                                                    <h4>{{ $konsentrasi->nama }}</h4>
                                                </div>
                                                <div class="ticket-info">
                                                    <div class="font-weight-600">
                                                        {{ $konsentrasi->program->nama }}
                                                    </div>
                                                    <div class="bullet"></div>
                                                    <div class="font-weight-600">
                                                        {{ $konsentrasi->program->bidang->nama }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-description">
                                            <div class="gallery gallery-fw" data-item-height="300">
                                                <div class="gallery-item" data-image="{{ asset($konsentrasi->gambar) }}"
                                                    data-title="{{ $konsentrasi->nama }}"></div>
                                            </div>

                                            {!! $konsentrasi->deskripsi !!}

                                            <div class="ticket-divider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <h2 class="section-title">Kelola Konsentrasi Keahlian</h2>
                        <p class="section-lead">
                            This page is just an example for you to create your own page.
                        </p>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Konsentrasi Keahlian</h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('konsentrasi.edit', $konsentrasi->slug) }}"
                                                class="btn btn-icon btn-warning" data-toggle="tooltip"
                                                title="Edit Konsentrasi Keahlian">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">
                                            Edit info konsentrasi keahlian disini.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Gambar Utama</h4>
                                        <div class="card-header-action">
                                            <a href="#" data-collapse="#images-collapse" class="btn btn-icon btn-success">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">
                                            Ganti gambar utama disini.
                                        </p>
                                        <div class="collapse hide" id="images-collapse">
                                            <hr>
                                            <form action="{{ route('konsentrasi.gambar', $konsentrasi->slug) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                <div class="form-group">
                                                    <label>Gambar Lama</label><br>
                                                    <img src="{{ asset($konsentrasi->gambar) }}" alt="{{ $konsentrasi->nama }}" style="width: 250px;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="gambar">Gambar Baru</label>
                                                    <div id="image-preview" class="image-preview">
                                                        <label for="image-upload" id="image-label">Pilih File</label>
                                                        <input type="file" class="form-control image-preview-filepond" name="gambar" id="image-upload" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Galeri</h4>
                                        <div class="card-header-action">
                                            <form action="{{ route('galeri.create') }}" method="get">
                                                <input type="hidden" name="id_konsentrasi" value="{{ $konsentrasi->id }}">
                                                <button type="submit" class="btn btn-icon btn-info" data-toggle="tooltip"
                                                    title="Tambah Gambar">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">
                                            Tambah gambar untuk galeri konsentrasi keahlian disini.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('dashboard.jurusan.galeri.index')
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection
