@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-button">
                    <a href="{{ route('ekskul.create') }}" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Kesiswaan</div>
                    <div class="breadcrumb-item">Ekstrakulikuler</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Kelola {{ $title }}</h2>
                <p class="section-lead">
                    Disini anda dapat mengelola dan melihat {{ $title }}
                </p>
                <div class="row">
                    @foreach ($ekskul as $item)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{ $item->nama }}</h4>
                                    <div class="card-header-action">
                                        <a data-collapse="#{{ $item->slug }}-collapse" class="btn btn-icon btn-info" href="#">
                                            <i class="fas fa-minus"></i>
                                        </a>
                                        <a href="{{ route('ekskul.edit', $item->slug) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Ekstrakurikuler">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('ekskul.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" title="Hapus Ekstrakurikuler">
                                            <i class="fas fa-times" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse show" id="{{ $item->slug }}-collapse">
                                    <div class="card-body">
                                        <div class="media">
                                            <img class="mr-3" src="{{ $item->gambar !== 'no-image-11.png' ? asset('storage/ekskul/' . $item->gambar) : asset('images/default/' . $item->gambar) }}" alt="{{ $item->nama }}" style="width: 100px">
                                            <div class="media-body">
                                                <h5 class="mt-0">{{ $item->nama }}</h5>
                                                <p class="mb-0">
                                                    @if ($item->link_sosmed !== null)
                                                        <a href="{{ $item->link_sosmed }}" target="_blank">{{ $item->link_sosmed }}</a>
                                                    @else
                                                        -
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
