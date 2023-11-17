@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/choices.js/public/assets/styles/choices.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('guru.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>Edit Data Baru</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Guru dan Staff</div>
                    <div class="breadcrumb-item">Edit Pendidik</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Di halaman ini Anda {{ $title }}.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tulis Post</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('guru.update', $guru->slug) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pendidik</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="nama" value="{{ $guru->nama }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bagian</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="bagian">
                                                <option value="pendidik" {{ $guru->bagian === 'pendidik' ? 'selected' : '' }}>Tenaga Pendidik</option>
                                                <option value="pegawai" {{ $guru->bagian === 'pegawai' ? 'selected' : '' }}>Tenaga Kepegawaian</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Bagian</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="sub_bagian">
                                                <option value="guru" {{ $guru->sub_bagian === 'guru' ? 'selected' : '' }}>Guru</option>
                                                <option value="staff" {{ $guru->sub_bagian === 'staff' ? 'selected' : '' }}>Staff</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mata Pelajaran</label>
                                        <div class="col-sm-12 col-md-7" style="z-index: 99">
                                            <select class="form-control choices" name="mapel">
                                                @foreach ($mapel as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id === $guru->mapel->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Pilih File</label>
                                                <input type="file" name="gambar" id="image-upload">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">Edit Data</button>
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
    <script src="{{ asset('assets/modules/choices.js/public/assets/scripts/choices.js') }}"></script>
    
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-choices.js')}}"></script>
    
    <script>
        function updateSelectOptions() {
            let bagian = document.getElementById("bagian");
            let subBagian = document.getElementById("sub_bagian");
            let formMapel = document.getElementById("form_mapel");
            let mapel = document.getElementById("mapel");

            if (bagian.value === "pendidik" && subBagian.value === "guru") {
                formMapel.style.display = "flex";
            } else if (bagian.value === "pegawai" && subBagian.value === "staff") {
                mapel.value = null;
                formMapel.style.display = "none";
            } else {
                formMapel.style.display = "flex";
            }
        }

        updateSelectOptions();
    </script>
@endsection
