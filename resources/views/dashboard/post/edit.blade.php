@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<div class="section-header-back">
					<a href="{{ route('post.index', $kategori) }}" class="btn btn-icon">
						<i class="fas fa-arrow-left"></i>
					</a>
				</div>
				<h1>{{ $title }}</h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active">
						<a href="{{ route('dashboard') }}">Dashboard</a>
					</div>
					<div class="breadcrumb-item">Post</div>
					<div class="breadcrumb-item active">
						<a href="{{ route('post.index', $kategori) }}">{{ ucfirst($kategori) }}</a>
					</div>
					<div class="breadcrumb-item">Edit Data</div>
				</div>
			</div>
			<div class="section-body">
				<h2 class="section-title">{{ $title }}</h2>
				<p class="section-lead">
                    Di halaman ini Anda dapat mengedit Data {{ ucfirst($kategori) }} dengan mengisi semua kolom.
				</p>
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4>Edit Data</h4>
							</div>
							<div class="card-body">
								@if ($errors->any())
									@foreach ($errors->all() as $error)
										<div class="alert alert-danger">{{ $error }}</div>
									@endforeach
								@endif
								<form action="{{ route('post.update', $post->slug) }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
									@csrf
									@method('PUT')
									<input type="hidden" name="penulis" value="{{ $post->id_penulis }}">
									<div class="form-group row mb-4">
										<label class="col-form-label text-md-right col-12 col-md-3">Gambar</label>
										<div class="col-12 col-md-7">
											<img src="{{ asset($post->gambar) }}" alt="{{ $post->judul }}" style="width: 250px">
										</div>
									</div>
									<div class="form-group row mb-4">
										<label for="judul" class="col-form-label text-md-right col-12 col-md-3">Judul</label>
										<div class="col-12 col-md-7">
											<input type="text" class="form-control" id="judul" name="judul" value="{{ $post->judul }}" required autofocus>
										</div>
									</div>
									<div class="form-group row mb-4">
										<label for="kategori" class="col-form-label text-md-right col-12 col-md-3">Kategori</label>
										<div class="col-12 col-md-7">
											<select class="form-control selectric" id="kategori" name="kategori" required>
												<option value="agenda" {{ $kategori === 'agenda' ? 'selected' : '' }}>Agenda</option>
												<option value="artikel" {{ $kategori === 'artikel' ? 'selected' : '' }}>Artikel</option>
												<option value="berita" {{ $kategori === 'berita' ? 'selected' : '' }}>Berita</option>
												<option value="event" {{ $kategori === 'event' ? 'selected' : '' }}>Event</option>
											</select>
										</div>
									</div>
									<div class="form-group row mb-4">
										<label for="konten" class="col-form-label text-md-right col-12 col-md-3">Konten</label>
										<div class="col-12 col-md-7">
											<textarea class="form-control" id="konten" name="konten" required>{{ $post->konten }}</textarea>
										</div>
									</div>
									<div class="form-group row mb-4">
										<label class="col-form-label text-md-right col-12 col-md-3">Gambar Baru (Opsional)</label>
										<div class="col-12 col-md-7">
											<div id="image-preview" class="image-preview">
												<label for="image-upload" id="image-label">Pilih File</label>
												<input type="file" class="form-control image-preview-filepond" name="gambar" id="image-upload" value="{{ $post->gambar }}" />
											</div>
										</div>
									</div>
									<div class="form-group row mb-4">
										<label class="col-form-label text-md-right col-12 col-md-3"></label>
										<div class="col-12 col-md-7">
											<button type="submit" class="btn btn-primary">Edit {{ ucfirst($kategori) }}</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('assets/modules/tinymce/tinymce.min.js') }}"></script>
    
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-tinymce.js') }}"></script>
@endsection