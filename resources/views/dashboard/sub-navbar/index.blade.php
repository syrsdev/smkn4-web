@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
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
                    <div class="breadcrumb-item">Sub Navbar</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Kelola {{ $title }}</h2>
                <p class="section-lead">
                    Di halaman ini Anda bisa menambah, mengedit dan menghapus {{ $title }}.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $title }}</h4>
                                <div class="card-header-action">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahSubNavbar">
                                        <i class="fas fa-plus"></i>
                                        Tambah Data
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Link</th>
                                                <th>Publish</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subNavbar as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name}}</td>
                                                    <td>{{ $item->url}}</td>
                                                    <td>
                                                        <label class="custom-switch mt-1">
                                                            <input type="checkbox" class="custom-switch-input" data-id="{{ $item->id }}" {{ $item->status === 1 ? 'checked' : '' }}>
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-{{ $item->id }} {{ $item->status === 1 ? 'badge-success' : 'badge-warning' }}">
                                                            {{ $item->status === 1 ? 'Published' : 'Draft' }}
                                                        </div>
													</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-warning btn-edit" data-id="{{ $item->id }}" data-toggle="tooltip" data-placement="top" title="Edit Sub Navbar">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <a href="{{ route('sub-navbar.destroy', $item->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" data-placement="top" title="Hapus Sub Navbar">
                                                            <i class="fas fa-trash" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('dashboard.sub-navbar.create')
        @include('dashboard.sub-navbar.edit')
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>

    <script>
        $('.btn-edit').click(function() {
            let id = $(this).data('id');
            $('#editSubNavbar' + id).modal('show');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.custom-switch-input').change(function() {
                let id = $(this).data('id');
                let status = $(this).prop('checked') === true ? 1 : 0;

                $.ajax({
                    type: 'GET',
                    url: '/dashboard/sub-navbar/' + id + '/status',
                    data: {
                        'status': status,
                    },
                    success: function(response) {
                        if (response.status === '1') {
                            badge = `
                                <div class="badge badge-success badge-${response.id}">Published</div>
                            `;
                        } else if (response.status === '0') {
                            badge = `
                                <div class="badge badge-warning badge-${response.id}">Draft</div>
                            `;
                        }

                        $(`.badge-${response.id}`).replaceWith(badge);
                    }
                });
            });
        });
    </script>
@endsection
