@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Edit {{ $title }}</h2>
                <p class="section-lead">
                    You can adjust all general settings here
                </p>
                <form action="{{ route('hero.update') }}" method="post" enctype="multipart/form-data" class="needs-validation">
                    @csrf
                    @method('PATCH')
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>{{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="welcome" class="form-control-label">Teks Selamat Datang</label>
                                    <input type="text" name="welcome" class="form-control" id="welcome" value="{{ $heroSection['welcome'] }}" required autofocus>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="nama_sekolah" class="form-control-label">Nama Sekolah</label>
                                    <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah" value="{{ $sekolah['nama_sekolah'] }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" style="height: 100px">{{ $heroSection['deskripsi'] }}</textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-control-label">Gambar</label><br>
                                    <img src="{{ asset($heroSection['hero_image']) }}" alt="Hero Image" style="width: 250px">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image-upload" class="form-control-label">Gambar Baru (Opsional)</label>
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Pilih File</label>
                                        <input type="file" class="form-control" name="hero_image" id="image-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                            <button type="submit" class="btn btn-primary" onclick="$.cardProgress('#settings-card');">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection