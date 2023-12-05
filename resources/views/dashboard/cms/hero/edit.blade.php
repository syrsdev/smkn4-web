@extends('layouts.cms')

@section('form')
    <form action="{{ route('hero.update') }}" method="post" enctype="multipart/form-data" class="needs-validation">
        @csrf
        @method('PATCH')
        <div class="card" id="settings-card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="welcome" class="form-control-label">Teks Selamat Datang</label>
                    <input type="text" name="welcome" class="form-control" id="welcome" value="{{ $heroSection['welcome'] }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="nama_sekolah" class="form-control-label">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah" value="{{ $sekolah['nama_sekolah'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="form-control-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi">{{ $heroSection['deskripsi'] }}</textarea>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label class="form-control-label">Gambar</label><br>
                        <img src="{{ asset($heroSection['hero_image']) }}" alt="Hero Image" style="width: 250px">
                    </div>
                    <div class="form-group col-lg-6">
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
@endsection