@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
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
                    <div class="breadcrumb-item">Guru dan Staff</div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Disini anda dapat menambahkan Data Tenaga Pendidik dan mengisinya dikolom yang sudah disediakan
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tulis Tenaga Pendidik</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('guru.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pendidik</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="nama" value="{{ Session::get('nama') }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bagian</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" id="bagian" name="bagian" onchange="updateSelectOptions()">
                                                <option disabled selected>Bagian</option>
                                                <option value="pendidik">Tenaga Pendidik</option>
                                                <option value="pegawai">Tenaga Kepegawaian</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Bagian</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" id="sub_bagian" name="sub_bagian" onchange="updateSelectOptions()">
                                                <option disabled selected>Sub Bagian</option>
                                                <option value="guru">Guru</option>
                                                <option value="staff">Staff</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4" id="form_mapel">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mata Pelajaran</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control select2" id="mapel" name="mapel">
                                                <option value="null" disabled selected>Mata Pelajaran</option>
                                                @foreach ($mapel as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
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
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script>
        "use strict";
    
        $("selectric").selectric();
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label",
            label_default: "Choose File",
            label_selected: "Change File",
            no_label: false,
            success_callback: null
        });
    </script>

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
