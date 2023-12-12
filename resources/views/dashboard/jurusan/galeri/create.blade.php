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
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Multiple Upload</h2>
                <p class="section-lead">
                    We use 'Dropzone.js' made by @Dropzone. You can check the full documentation <a href="http://www.dropzonejs.com/">here</a>.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Multiple Upload</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('galeri.store') }}" method="post" enctype="multipart/form-data" class="dropzone" id="mydropzone">
                                    @csrf
                                    <input type="hidden" name="id_konsentrasi" id="id_konsentrasi" value="{{ $konsentrasi->id }}">
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
            init: function () {
                this.on("sending", function (file, xhr, formData) {
                    let id = document.getElementById("id_konsentrasi").value;
                    
                    formData.append("id_konsentrasi", id);
                });
                this.on("success", function (file, response) {
                    console.log(response);
                    location.reload(); 
                });
                this.on("error", function (file, message) {
                    console.log(message);
                    location.reload(); 
                });
            }
        });
    </script>
@endsection
