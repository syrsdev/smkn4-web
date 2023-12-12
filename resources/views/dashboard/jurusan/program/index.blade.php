@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/choices.js/public/assets/styles/choices.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-button">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahProgram">
                        Tambah Data
                    </button>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Jurusan</div>
                    <div class="breadcrumb-item">Program Keahlian</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Kelola {{ $title }}</h2>
                <p class="section-lead">
                    Disini anda dapat mengelola dan melihat {{ $title }}
                </p>
                <div class="row">
                    @foreach ($program as $item)
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5>{{ $item->nama }}</h5>
                                    <P>Bidang Keahlian: {{ $item->bidang->nama }}</P>
                                    <p>Total Konsentrasi Keahlian: {{ $item->konsentrasi_count }}</p>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-sm btn-warning btn-edit" data-slug="{{ $item->slug }}"
                                        data-toggle="tooltip" title="Edit Program Keahlian">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <a href="{{ route('program.destroy', $item->slug) }}" class="btn btn-sm btn-danger"
                                        data-confirm-delete="true" data-toggle="tooltip" title="Hapus Program Keahlian">
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
        @include('dashboard.jurusan.program.create')
        @include('dashboard.jurusan.program.edit')
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/choices.js/public/assets/scripts/choices.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-choices.js') }}"></script>
    <script>
        $('.btn-edit').click(function() {
            let slug = $(this).data('slug');
            $('#editProgram' + slug).modal('show');
        });
    </script>
@endsection
