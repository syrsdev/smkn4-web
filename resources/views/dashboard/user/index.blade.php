@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-button">
                    <button class="btn btn-primary" data-toggle="collapse" data-target="#tambahUser">
                        Tambah User
                    </button>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Kelola User</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Di halaman ini Anda bisa menambah, mengedit dan menghapus {{ $title }}.
                </p>
                @include('dashboard.user.create')
                <div class="row">
                    @foreach ($users as $item)
                        <div class="col-12 col-md-6">
                            <div class="card author-box card-primary">
                                <div class="card-body">
                                    <div class="author-box-left">
                                        <img src="{{ url('images/default/profile-admin.png') }}" alt="{{ $item->name }}" class="rounded-circle author-box-picture">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="author-box-details">
                                        <div class="author-box-name">
                                            <p class="font-weight-bold">{{ $item->name }}</p>
                                        </div>
                                        <div class="author-box-job">
                                            {{ ucfirst($item->level) }} / {{ $item->email }}
                                        </div>
                                        <div class="author-box-description">
                                            {{ $item->post_count + $item->prestasi_count }} Posts
                                            <div class="bullet"></div>
                                            {{ $item->views['post'] + $item->views['prestasi'] }} Views
                                        </div>
                                        <div class="mb-2 mt-3">
                                            <div class="text-small font-weight-bold">Menu</div>
                                        </div>
                                        @if ($item->id !== Auth::id())
                                            <button class="btn btn-sm btn-warning" data-toggle="collapse" data-target="#edit{{ $item->slug }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="{{ route('user.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true">
                                                <i class="fas fa-trash" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('profile.index') }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        @endif
                                        <div class="w-100 d-sm-none"></div>
                                    </div>
                                    @include('dashboard.user.edit')
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
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection
