@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
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
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Di halaman ini Anda bisa menambah, mengedit dan menghapus {{ $title }}.
                </p>
                <div class="row sortable-card">
                    @foreach ($sosmed as $item)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4>
                                        <i class="fab fa-{{ strtolower($item->name) }} mr-1"></i>
                                        {{ $item->name }}
                                    </h4>
                                    <div class="card-header-action">
                                        <a data-collapse="#{{ $item->name }}-collapse" class="btn btn-icon btn-info" href="#">
                                            <i class="fas fa-minus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse show" id="{{ $item->name }}-collapse">
                                    <div class="card-body">
                                        @if ($item->url !== null)
                                            <a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a>
                                        @else
                                            -
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#editSosmed{{ $item->name }}">
                                            <i class="fas fa-edit"></i>
                                            Edit Link
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @include('dashboard.sosmed.edit')
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
