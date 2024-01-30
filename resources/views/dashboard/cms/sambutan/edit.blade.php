@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/choices.js/public/assets/styles/choices.css') }}">
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
                    <div class="breadcrumb-item">Profil Sekolah</div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Edit {{ $title }}</h2>
                <p class="section-lead">
                    Anda bisa menambahkan sambutan kepala sekolah disini
                </p>
                <form action="{{ route('sambutan.update', $sambutan->id) }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('PATCH')
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>{{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="judul_sambutan" class="form-control-label">Judul Sambutan</label>
                                    <input type="text" name="judul_sambutan" class="form-control" id="judul_sambutan" value="{{ $sambutan->judul }}" required autofocus>
                                </div>
                                <div class="form-group col-lg-6" style="z-index: 999">
                                    <label for="kepala_sekolah" class="form-control-label">Kepala Sekolah</label>
                                    <select class="form-control choices" name="kepala_sekolah" id="kepala_sekolah" required>
                                        @foreach ($guru as $item)
                                            <option value="{{ $item->id }}" {{ $sambutan->id_kepsek == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sambutan" class="form-control-label">Sambutan</label>
                                <textarea class="form-control" name="sambutan" style="height: 200px" required>{{ $sambutan->konten }}</textarea>
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
    <script src="{{ asset('assets/modules/choices.js/public/assets/scripts/choices.js') }}"></script>\
    <script src="{{ asset('assets/modules/tinymce/tinymce.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-choices.js')}}"></script>
    <script src="{{ asset('assets/js/page/modules-tinymce.js') }}"></script>
@endsection