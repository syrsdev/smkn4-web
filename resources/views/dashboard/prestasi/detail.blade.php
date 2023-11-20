@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('dashboard') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Kesiswaan</div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Disini anda dapat melihat {{$title}}.
                </p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{$title}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="tickets">
                                    <div class="ticket-items" id="ticket-items">
                                        @foreach ($other as $item)
                                            <a href="{{ route('prestasi.show', $item->slug) }}">
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
                                                <img src="{{ asset('images/default/profile-admin.png') }}" alt="{{ $prestasi->penulis->name }}">
                                            </div>
                                            <div class="ticket-detail">
                                                <div class="ticket-title">
                                                    <h4>{{ $prestasi->judul }}</h4>
                                                </div>
                                                <div class="ticket-info">
                                                    <div class="font-weight-600">{{ $prestasi->penulis->name }}</div>
                                                    <div class="bullet"></div>
                                                    <div class="text-primary font-weight-600">{{ $prestasi->created_at->format('j F Y') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-description">
                                            <div class="gallery mb-3">
                                                <img src="{{ $prestasi->gambar !== 'no-image-43.png' ? url('storage/prestasi/' . $prestasi->gambar) : url('images/default/' . $prestasi->gambar) }}" alt="{{ $prestasi->judul }}" style="width: 400px;">
                                            </div>

                                            {!! $prestasi->konten !!}

                                            <div class="ticket-divider"></div>
                                            <div class="ticket-form">
                                                <div class="form-group text-right">
                                                    <a href="{{ route('prestasi.edit', $prestasi->slug) }}" class="btn btn-primary">
                                                        Edit Prestasi
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
@endsection