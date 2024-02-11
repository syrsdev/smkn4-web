@extends('layouts.app')

@section('link')
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
                <h2 class="section-title">Kelola Data Sosial Media</h2>
                <p class="section-lead">
                    Anda bisa menyesuaikan link sesuai dengan Sosial Media Sekolah.
                </p>
                <div class="row">
                    @foreach ($sosmed as $item)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{ $item->name }}</h4>
                                    <div class="card-header-action">
                                        <a data-collapse="#{{ $item->name }}-collapse" class="btn btn-icon btn-info" href="#">
                                            <i class="fas fa-minus"></i>
                                        </a>
                                        <button class="btn btn-sm btn-warning btn-edit" data-name="{{ $item->name }}" data-toggle="tooltip" title="Edit Link">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse show" id="{{ $item->name }}-collapse">
                                    <div class="card-body">
                                        <div class="media">
                                            <i class="fab fa-{{ strtolower($item->name) }} mr-3" style="font-size: 50px"></i>
                                            <div class="media-body">
                                                <h5 class="mt-0">{{ $item->name }}</h5>
                                                @if ($item->url !== null)
                                                    <a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a>
                                                @else
                                                    -
                                                @endif
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
        @include('dashboard.sosmed.edit')
    </div>
@endsection

@section('script')
    <!-- Page Specific JS File -->
    <script>
        $('.btn-edit').click(function() {
            let name = $(this).data('name');
            $('#editSosmed' + name).modal('show');
        });
    </script>
@endsection