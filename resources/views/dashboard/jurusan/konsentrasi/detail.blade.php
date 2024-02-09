@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/chocolat/dist/css/chocolat.css') }}">
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
                    <div class="breadcrumb-item">Detail Data</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <div class="row">
                    <div class="col-12">
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
                                                <div class="gallery-item" data-image="{{ asset($konsentrasi->gambar) }}" data-title="{{ $konsentrasi->nama }}"></div>
                                            </div>
                                            <div class="col-12">
                                                {!! $konsentrasi->deskripsi !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-right">
                                <a href="{{ route('konsentrasi.edit', $konsentrasi->slug) }}" class="btn btn-primary">
                                    Edit Data
                                </a>
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
@endsection
