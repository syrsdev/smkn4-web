@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/choices.js/public/assets/styles/choices.css') }}">

	<style>
		.tox-promotion {
			display: none !important;
		}
	</style>
@endsection

@section('content')
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<div class="section-header-back">
					<a href="{{ route('konsentrasi.index') }}" class="btn btn-icon">
						<i class="fas fa-arrow-left"></i>
					</a>
				</div>
				<h1>{{ $title }}</h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active">
						<a href="{{ route('dashboard') }}">Dashboard</a>
					</div>
					<div class="breadcrumb-item">Jurusan</div>
					<div class="breadcrumb-item active">
						<a href="{{ route('konsentrasi.index') }}">Konsentrasi Keahlian</a>
					</div>
					<div class="breadcrumb-item">{{ $title }}</div>
				</div>
			</div>
			<div class="section-body">
				<h2 class="section-title">{{ $title }}</h2>
				<p class="section-lead">
					Di halaman ini Anda {{ $title }}.
				</p>
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4>{{ $title }}</h4>
							</div>
							<div class="card-body">
								<form action="{{ route('konsentrasi.update', $konsentrasi->slug) }}" method="post" enctype="multipart/form-data">
									@csrf
									@method('PUT')
									<div class="form-group row mb-4">
										<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Icon</label>
										<div class="col-sm-12 col-md-7">
											<img src="{{ asset($konsentrasi->icon) }}" alt="{{ $konsentrasi->nama }}" style="width: 250px">
										</div>
									</div>
									<div class="form-group row mb-4">
										<label for="nama" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Konsentrasi Keahlian</label>
										<div class="col-sm-12 col-md-7">
											<input type="text" class="form-control" id="nama" name="nama" value="{{ $konsentrasi->nama }}">
										</div>
									</div>
									<div class="form-group row mb-4">
										<label for="id_program" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Program Keahlian</label>
										<div class="col-sm-12 col-md-7">
											<select class="form-control choices" id="id_program" name="id_program">
                                                @foreach ($program as $item)
												    <option value="{{ $item->id }}" {{ $konsentrasi->id_program === $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
											</select>
										</div>
									</div>
									<div class="form-group row mb-4">
										<label for="deskripsi" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Konsentrasi Keahlian</label>
										<div class="col-sm-12 col-md-7">
											<textarea class="form-control" id="deskripsi" name="deskripsi">{{ $konsentrasi->deskripsi }}</textarea>
										</div>
									</div>
									<div class="form-group row mb-4">
										<label for="icon" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Icon Baru (Opsional)</label>
										<div class="col-sm-12 col-md-7">
											<div id="image-preview" class="image-preview">
												<label for="image-upload" id="image-label">Pilih File</label>
												<input type="file" class="form-control image-preview-filepond" name="icon" id="image-upload" value="{{ $konsentrasi->icon }}" />
											</div>
										</div>
									</div>
									<div class="form-group row mb-4">
										<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
										<div class="col-sm-12 col-md-7">
											<button type="submit" class="btn btn-primary">Edit Data</button>
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
    <script src="{{ asset('assets/modules/choices.js/public/assets/scripts/choices.js') }}"></script>
    
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-tinymce.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-choices.js')}}"></script>
@endsection