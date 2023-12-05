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
                    <div class="breadcrumb-item">Pengaturan</div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Edit {{ $title }}</h2>
                <p class="section-lead">
                    You can adjust all general settings here
                </p>
                <div id="output-status"></div>
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="card sticky-md-top">
                            <div class="card-header">
                                <h4>Navigasi ke</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item"><a href="#" class="nav-link {{ $tab === 'Identitas' ? 'active' : '' }}">Identitas Sekolah</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link {{ $tab === 'Sejarah' ? 'active' : '' }}">Sejarah Sekolah</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link {{ $tab === 'Visi-Misi' ? 'active' : '' }}">Visi & Misi Sekolah</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link {{ $tab === 'Sambutan' ? 'active' : '' }}">Sambutan Kepala Sekolah</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link {{ $tab === 'Hero' ? 'active' : '' }}">Hero Konten</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-9">
                        @yield('form')
                    </div>
                </div>
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