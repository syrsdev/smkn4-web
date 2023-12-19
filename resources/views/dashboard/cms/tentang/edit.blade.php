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
                    <div class="breadcrumb-item">Profil Sekolah</div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Edit {{ $title }}</h2>
                <p class="section-lead">
                    Anda bisa menambahkan informasi tentang sekolah disini. Mulai dari sejarah sekolah, visi, misi, dan tujuan sekolah.
                </p>
                <form action="{{ route('tentang.update') }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="card" id="settings-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <textarea class="form-control" name="tentang_sekolah" id="tentang_sekolah" style="height: 500px">{{ $tentang['tentang_sekolah'] }}</textarea>
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
    <script src="{{ asset('assets/modules/tinymce/tinymce.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-tinymce.js') }}"></script>
@endsection