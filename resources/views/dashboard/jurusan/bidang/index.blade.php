@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-button">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBidang  ">
                        Tambah Data
                    </button>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Jurusan</div>
                    <div class="breadcrumb-item">Bidang Keahlian</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Kelola {{ $title }}</h2>
                <p class="section-lead">
                    Disini anda dapat mengelola dan melihat {{ $title }}
                </p>
                <div class="row">
                    @foreach ($bidang as $item)
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mt-0">{{ $item->nama }}</h5>
                                    <p>Total Program Keahlian : {{ $item->program_count }}</p>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-sm btn-warning btn-edit" data-slug="{{ $item->slug }}"
                                        data-toggle="tooltip" title="Edit Bidang Keahlian">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <a href="{{ route('bidang.destroy', $item->slug) }}" class="btn btn-sm btn-danger"
                                        data-confirm-delete="true" data-toggle="tooltip" title="Hapus Bidang Keahlian">
                                        <i class="fas fa-trash"
                                            onclick="event.preventDefault(); this.closest('a').click();"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @include('dashboard.jurusan.bidang.create')
        @include('dashboard.jurusan.bidang.edit')
    </div>
@endsection

@section('script')
    <!-- Page Specific JS File -->
    <script>
        $('.btn-edit').click(function() {
            let slug = $(this).data('slug');
            $('#editBidang' + slug).modal('show');
        });
    </script>
@endsection
