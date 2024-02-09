@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/dropzonejs/dropzone.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
					<a href="{{ route('konsentrasi.show', $konsentrasi->slug) }}" class="btn btn-icon">
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
                    <div class="breadcrumb-item">Tambah Gambar</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Upload beberapa gambar untuk ditambahkan ke Galeri {{ $konsentrasi->nama }}
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Upload Gambar</h4>
                                <div class="card-header-action">
                                    <button class="btn btn-sm btn-primary" id="upload-button">
                                        <i class="fas fa-upload"></i>
                                        Upload
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('galeri.store') }}" method="post" enctype="multipart/form-data" class="dropzone" id="mydropzone">
                                    @csrf
                                    <input type="hidden" name="konsentrasi" id="konsentrasi" value="{{ $konsentrasi->id }}">
                                    <div class="fallback">
                                        <input type="file" name="gambar[]" multiple />
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
    <script src="{{ asset('assets/modules/dropzonejs/min/dropzone.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script>
        "use strict";

        let dropzone = new Dropzone("#mydropzone", {
            url: "{{ route('galeri.store') }}",
            method: "post",
            paramName: "gambar[]",
            parallelUploads: 100,
            autoProcessQueue: false,
            init: function () {
                this.on("sending", function (file, xhr, formData) {
                    let id = document.getElementById("konsentrasi").value;
                    
                    formData.append("konsentrasi", id);
                });
                this.on("success", function (file, response) {
                    window.location.href = "{{ route('konsentrasi.show', $konsentrasi->slug) }}";
                });
                this.on("error", function (file, message) {
                    location.reload();
                });
                document.getElementById("upload-button").addEventListener("click", function () {
                    dropzone.processQueue();
                });
            }
        });
    </script>
@endsection
