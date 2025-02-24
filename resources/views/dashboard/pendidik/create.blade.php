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
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('guru.index') }}">Tenaga Pendidik</a>
                    </div>
                    <div class="breadcrumb-item">Tambah Data</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Di halaman ini Anda dapat membuat Data Tenaga Pendidik baru dengan mengisi semua kolom.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Data</h4>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    @endforeach
                                @endif
                                <form action="{{ route('guru.store') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label for="nama" class="col-form-label text-md-right col-12 col-md-3">Nama Tenaga Pendidik</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="bagian" class="col-form-label text-md-right col-12 col-md-3">Bagian</label>
                                        <div class="col-12 col-md-7">
                                            <select class="form-control selectric" id="bagian" name="bagian" required onchange="updateSelectOptions()">
                                                <option disabled selected>Bagian</option>
                                                <option value="Pendidik">Tenaga Pendidik</option>
                                                <option value="Kependidikan">Tenaga Kependidikan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4" id="form_mapel">
                                        <label for="mapel" class="col-form-label text-md-right col-12 col-md-3">Mata Pelajaran</label>
                                        <div class="col-sm-12 col-md-7" style="z-index: 99">
                                            <select class="form-control choices" id="mapel" name="mapel">
                                                <option value="null" disabled selected>Mata Pelajaran</option>
                                                @foreach ($mapel as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3">Foto</label>
                                        <div class="col-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Pilih File</label>
                                                <input type="file" name="gambar" id="image-upload">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3"></label>
                                        <div class="col-12 col-md-7">
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
    <script src="{{ asset('assets/modules/choices.js/public/assets/scripts/choices.js') }}"></script>
    
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-choices.js')}}"></script>

    <script>
        function updateSelectOptions() {
            let bagian = document.getElementById("bagian");
            let formMapel = document.getElementById("form_mapel");
            let mapel = document.getElementById("mapel");

            if (bagian.value === "Pendidik") {
                formMapel.style.display = "flex";
            } else if (bagian.value === "Kependidikan") {
                formMapel.style.display = "none";
            } else {
                formMapel.style.display = "flex";
            }
        }

        updateSelectOptions();
    </script>
@endsection
