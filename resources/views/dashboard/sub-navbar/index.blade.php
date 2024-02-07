@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-button">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahSubNavbar">
                        Tambah Data
                    </button>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Sub Navbar</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Kelola {{ $title }}</h2>
                <p class="section-lead">
                    Di halaman ini Anda bisa mengelola {{ $title }}.
                </p>
                <div class="row">
                    @foreach ($subNavbar as $item)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{ $item->name }}</h4>
                                    <div class="card-header-action">
                                        <a data-collapse="#{{ $item->id }}-collapse" class="btn btn-icon btn-info" href="#">
                                            <i class="fas fa-minus"></i>
                                        </a>
                                        <button class="btn btn-sm btn-warning btn-edit" data-id="{{ $item->id }}" data-toggle="tooltip" title="Edit Sub Navbar">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <a href="{{ route('sub-navbar.destroy', $item->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" title="Hapus Sub Navbar">
                                            <i class="fas fa-times" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse show" id="{{ $item->id }}-collapse">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="mt-0">{{ $item->name }}</h5>
                                                <p class="mb-0">
                                                    @if ($item->url !== null)
                                                        <a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a>
                                                    @else
                                                        -
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer row">
                                        <div class="col-6">
                                            <form action="{{ route('sub-navbar.status', $item->id) }}" method="GET">
                                                @csrf
                                                <input type="hidden" name="status" value="{{ $item->status === 1 ? 0 : 1 }}">
                                                <label class="custom-switch mt-1">
                                                    <input type="checkbox" class="custom-switch-input" {{ $item->status === 1 ? 'checked' : '' }} onclick="this.form.submit()">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </form>
                                        </div>
                                        <div class="col-6 text-right">
                                            <div class="badge badge-{{ $item->id }} {{ $item->status === 1 ? 'badge-success' : 'badge-warning' }}">
                                                {{ $item->status === 1 ? 'Published' : 'Draft' }}
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
        @include('dashboard.sub-navbar.create')
        @include('dashboard.sub-navbar.edit')
    </div>
@endsection

@section('script')
    <!-- Page Specific JS File -->
    <script>
        $('.btn-edit').click(function() {
            let id = $(this).data('id');
            $('#editSubNavbar' + id).modal('show');
        });
    </script>
@endsection
