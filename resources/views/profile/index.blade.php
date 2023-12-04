@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hi, {{ Auth::user()->name }}!</h2>
                <p class="section-lead">
                    Ubah informasi tentang diri Anda di halaman ini.
                </p>
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="{{ asset('images/default/profile-admin.png') }}" class="rounded-circle profile-widget-picture" data-toggle="tooltip" title="{{ Auth::user()->name }}">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Posts</div>
                                        <div class="profile-widget-item-value">{{ $post['totalPost'] }}</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Views</div>
                                        <div class="profile-widget-item-value">{{ $post['totalViews'] }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">{{ Auth::user()->name }}
                                    <div class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div> {{ ucfirst(Auth::user()->level) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="section-title">Post Terbaru</h2>
                        <p class="section-lead">
                            Berikut adalah post terbaru Anda.
                        </p>
                        <div class="row">
                            @foreach ($post['getPost']['post'] as $item)
                                <div class="col-12 col-sm-6">
                                    <article class="article article-style-b">
                                        <div class="article-header">
                                            <div class="article-image" data-background="{{ $item->gambar }}">
                                            </div>
                                            <div class="article-badge">
                                                <div class="article-badge-item bg-info">
                                                    {{ $item->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="article-details">
                                            <div class="article-title">
                                                <h2><a href="{{ route('post.show', $item->slug) }}">
                                                    @if (strlen($item->judul) > 25)
                                                        {{ substr($item->judul, 0, 25) . '...' }}
                                                    @else
                                                        {{ $item->judul }}    
                                                    @endif
                                                </a></h2>
                                            </div>
                                            <p>
                                                @if (strlen(strip_tags($item->konten)) > 100)
                                                   {!! '<p>' . substr(strip_tags($item->konten), 0, 100) . '...</p>' !!}
                                                @else
                                                   {!! '<p>' . $item->konten . '</p>' !!}
                                                @endif
                                            </p>
                                            <div class="article-cta">
                                                <a href="{{ route('post.show', $item->slug) }}">
                                                    Selengkapnya 
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                            @foreach ($post['getPost']['prestasi'] as $item)
                                <div class="col-12 col-sm-6 col-md-6">
                                    <article class="article article-style-b">
                                        <div class="article-header">
                                            <div class="article-image" data-background="{{ $item->gambar }}">
                                            </div>
                                            <div class="article-badge">
                                                <div class="article-badge-item bg-info">
                                                    {{ $item->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="article-details">
                                            <div class="article-title">
                                                <h2><a href="{{ route('prestasi.show', $item->slug) }}">
                                                    @if (strlen($item->judul) > 25)
                                                        {{ substr($item->judul, 0, 25) . '...' }}
                                                    @else
                                                        {{ $item->judul }}    
                                                    @endif
                                                </a></h2>
                                            </div>
                                            <p>
                                                @if (strlen(strip_tags($item->konten)) > 100)
                                                   {!! '<p>' . substr(strip_tags($item->konten), 0, 100) . '...</p>' !!}
                                                @else
                                                   {!! '<p>' . $item->konten . '</p>' !!}
                                                @endif
                                            </p>
                                            <div class="article-cta">
                                                <a href="{{ route('prestasi.show', $item->slug) }}">
                                                    Selengkapnya 
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="card">
                            <form action="{{ route('profile.update') }}" method="post" class="needs-validation" novalidate="">
                                @csrf
                                @method('PATCH')
                                <div class="card-header">
                                    <h4>Informasi Profile</h4>
                                </div>
                                <div class="card-body">
                                    <p>Perbarui informasi profil dan alamat email akun Anda.</p>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                                            <div class="invalid-feedback">
                                                Silakan isi nama lengkap Anda
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                                            <div class="invalid-feedback">
                                                Silakan isi email Anda
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <form action="{{ route('password.update') }}" method="post" class="needs-validation" novalidate="">
                                @csrf
                                @method('PUT')
                                <div class="card-header">
                                    <h4>Perbarui Password</h4>
                                </div>
                                <div class="card-body">
                                    <p>Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.</p>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Password Saat Ini</label>
                                            <input type="password" class="form-control" name="current_password" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Password Baru</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection