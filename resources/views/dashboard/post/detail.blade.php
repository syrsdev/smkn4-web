@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/chocolat/dist/css/chocolat.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('post.index', $kategori) }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Post</div>
                    <div class="breadcrumb-item active"><a href="{{ route('post.index', $kategori) }}">{{ ucfirst($kategori) }}</a></div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Di halaman ini Anda {{ $title }}.
                </p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ ucfirst($kategori) }}</h4>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items">
                                    <i class="fas fa-list"></i> {{ ucfirst($kategori) }} Lainnya
                                </a>
                                <div class="tickets">
                                    <div class="ticket-items" id="ticket-items">
                                        @foreach ($otherPost as $item)
                                            <a href="{{ route('post.show', $item->slug) }}">
                                                <div class="ticket-item">
                                                    <div class="ticket-title">
                                                        <h4>{{ $item->judul }}</h4>
                                                    </div>
                                                    <div class="ticket-desc">
                                                        <div>{{ $item->penulis->name }}</div>
                                                        <div class="bullet"></div>
                                                        <div>{{ $item->created_at->format('j F Y') }}</div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="ticket-content">
                                        <div class="ticket-header">
                                            <div class="ticket-sender-picture img-shadow">
                                                <img src="{{ asset('images/default/profile-admin.png') }}" alt="{{ $post->penulis->name }}">
                                            </div>
                                            <div class="ticket-detail">
                                                <div class="ticket-title">
                                                    <h4>{{ $post->judul }}</h4>
                                                </div>
                                                <div class="ticket-info">
                                                    <div class="font-weight-600">{{ $post->penulis->name }}</div>
                                                    <div class="bullet"></div>
                                                    <div class="text-primary font-weight-600">{{ $post->created_at->format('j F Y') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-description">
                                            <div class="gallery mb-3">
                                                <img src="{{ $post->gambar !== 'no-image-43.png' ? url('storage/' . $kategori . '/' . $post->gambar) : url('images/default/' . $post->gambar) }}" alt="{{ $post->judul }}" style="width: 400px;">
                                            </div>

                                            {!! $post->konten !!}

                                            <div class="ticket-divider"></div>
                                            <div class="ticket-form">
                                                <div class="form-group text-right">
                                                    <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-primary">
                                                        Edit {{ ucfirst($kategori) }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endsection
