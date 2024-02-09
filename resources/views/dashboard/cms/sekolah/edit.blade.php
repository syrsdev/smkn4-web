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
                <h2 class="section-title">Pengaturan {{ $title }}</h2>
                <p class="section-lead">
                    Personalisasikan Identitas Sekolah dengan Nama Sekolah, Logo Sekolah, dan lainnya yang telah disediakan.
                </p>
                <form action="{{ route('sekolah.update') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PATCH')
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>{{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_sekolah" class="form-control-label">Nama Sekolah</label>
                                <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah" value="{{ $sekolah['nama_sekolah'] }}" required autofocus>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-3">
                                    <label class="form-control-label">Logo Sekolah (Navbar)</label><br>
                                    <img src="{{ asset($sekolah['logo_sekolah']) }}" alt="Logo Sekolah" style="width: 250px">
                                </div>
                                <div class="form-group col-12 col-lg-9">
                                    <label for="logo_sekolah" class="form-control-label">Logo Sekolah (Navbar) Baru</label>
                                    <input type="file" class="form-control" name="logo_sekolah" id="logo_sekolah">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-3">
                                    <label class="form-control-label">Logo Sekolah (Favicon)</label><br>
                                    <img src="{{ asset($sekolah['favicon']) }}" alt="Favicon" style="width: 250px">
                                </div>
                                <div class="form-group col-12 col-lg-9">
                                    <label for="favicon" class="form-control-label">Logo Sekolah (Favicon) Baru</label>
                                    <input type="file" class="form-control" name="favicon" id="favicon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat_sekolah" class="form-control-label">Alamat Sekolah</label>
                                <textarea class="form-control" name="alamat_sekolah" style="height: 100px" required>{{ $sekolah['alamat_sekolah'] }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="sematkan_peta" class="form-control-label">Sematkan Peta</label>
                                <textarea class="form-control" name="sematkan_peta" style="height: 100px">{{ $sekolah['sematkan_peta'] }}</textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-4">
                                    <label for="fax_sekolah" class="form-control-label">Fax Sekolah</label>
                                    <input type="text" name="fax_sekolah" class="form-control" id="fax_sekolah" value="{{ $sekolah['fax_sekolah'] }}" required>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="email_sekolah" class="form-control-label">Email Sekolah</label>
                                    <input type="email" name="email_sekolah" class="form-control" id="email_sekolah" value="{{ $sekolah['email_sekolah'] }}" required>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="telepon_sekolah" class="form-control-label">Telepon Sekolah</label>
                                    <input type="text" name="telepon_sekolah" class="form-control" id="telepon_sekolah" value="{{ $sekolah['telepon_sekolah'] }}" required>
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