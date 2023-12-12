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
                    <div class="breadcrumb-item">Kesiswaan</div>
                    <div class="breadcrumb-item">Prestasi</div>
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
                                    <a href="{{ route('prestasi.create') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus"></i>
                                        Tambah Prestasi
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Judul</th>
                                                <th>Kategori</th>
                                                <th>Pemenang</th>
                                                <th>Views</th>
                                                <th>Publish</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($prestasi as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->judul}}</td>
                                                    <td>{{ ucfirst($item->kategori) }}</td>
                                                    <td>{{ $item->pemenang }}</td>
                                                    <td>{{ $item->views ? $item->views : 0 }}</td>
                                                    <td>
														<label class="custom-switch mt-1">
                                                            <input type="checkbox" class="custom-switch-input" data-slug="{{ $item->slug }}" {{ $item->status === 1 ? 'checked' : '' }}>
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
													</td>
                                                    <td>
                                                        <div class="badge badge-{{ $item->slug }} {{ $item->status === 1 ? 'badge-success' : 'badge-warning' }}">
                                                            {{ $item->status === 1 ? 'Published' : 'Draft' }}
                                                        </div>
													</td>
                                                    <td>
                                                        <a href="{{ route('prestasi.show', $item->slug) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat Prestasi">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('prestasi.edit', $item->slug) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Prestasi">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('prestasi.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" title="Hapus Prestasi">
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
        $(document).ready(function() {
            $('.custom-switch-input').change(function() {
                let slug = $(this).data('slug');
                let status = $(this).prop('checked') === true ? 1 : 0;

                $.ajax({
                    type: 'GET',
                    url: '/dashboard/kesiswaan/prestasi/' + slug + '/status',
                    data: {
                        'status': status,
                    },
                    success: function(response) {
                        if (response.status === '1') {
                            badge = `
                                <div class="badge badge-success badge-${response.slug}">Published</div>
                            `;
                        } else if (response.status === '0') {
                            badge = `
                                <div class="badge badge-warning badge-${response.slug}">Draft</div>
                            `;
                        }

                        $(`.badge-${response.slug}`).replaceWith(badge);
                    }
                });
            });
        });
    </script>
@endsection
