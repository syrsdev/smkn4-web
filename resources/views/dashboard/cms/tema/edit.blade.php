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
                    Disini anda dapat mengedit {{ $title }}
                </p>
                <form action="{{ route('tema.update') }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('PATCH')
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>{{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="warna_primer" class="form-control-label">Warna Primer</label>
                                    <input type="color" name="warna_primer" class="form-control" id="warna_primer" value="{{ $tema['warna_primer'] }}" required>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="warna_sekunder" class="form-control-label">Warna Sekunder</label>
                                    <input type="color" name="warna_sekunder" class="form-control" id="warna_sekunder" value="{{ $tema['warna_sekunder'] }}" required>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="warna_aksen" class="form-control-label">Warna Aksen</label>
                                    <input type="color" name="warna_aksen" class="form-control" id="warna_aksen" value="{{ $tema['warna_aksen'] }}" required>
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
@endsection