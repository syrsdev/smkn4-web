@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/choices.js/public/assets/styles/choices.css') }}">
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
					<div class="breadcrumb-item">Edit Data</div>
				</div>
			</div>
			<div class="section-body">
				<h2 class="section-title">{{ $title }}</h2>
				<p class="section-lead">
					Di halaman ini Anda dapat mengedit Data Konsentrasi Keahlian dengan mengisi semua kolom.
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
								<form action="{{ route('konsentrasi.update', $konsentrasi->slug) }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
									@csrf
									@method('PUT')
									<div class="form-group row mb-4">
										<label for="nama" class="col-form-label text-md-right col-12 col-md-3">Nama Konsentrasi Keahlian</label>
										<div class="col-12 col-md-7">
											<input type="text" class="form-control" id="nama" name="nama" value="{{ $konsentrasi->nama }}" required autofocus>
										</div>
									</div>
									<div class="form-group row mb-4">
										<label for="program" class="col-form-label text-md-right col-12 col-md-3">Program Keahlian</label>
										<div class="col-12 col-md-7">
											<select class="form-control choices" id="program" name="program" required>
                                                @foreach ($program as $item)
												    <option value="{{ $item->id }}" {{ $konsentrasi->id_program === $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
											</select>
										</div>
									</div>
									<div class="form-group row mb-4">
										<label for="deskripsi" class="col-form-label text-md-right col-12 col-md-3">Deskripsi</label>
										<div class="col-12 col-md-7">
											<textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $konsentrasi->deskripsi }}</textarea>
										</div>
									</div>
									<div class="form-group row mb-4">
										<label class="col-form-label text-md-right col-12 col-md-3">Icon</label>
										<div class="col-12 col-md-7">
											<img src="{{ asset($konsentrasi->icon) }}" alt="{{ $konsentrasi->nama }}" style="width: 250px">
										</div>
									</div>
									<div class="form-group row mb-4">
										<label for="icon" class="col-form-label text-md-right col-12 col-md-3">Icon Baru (Opsional)</label>
										<div class="col-12 col-md-7">
											<input type="file" class="form-control" name="icon" id="icon">
										</div>
									</div>
									<div class="form-group row mb-4">
										<label class="col-form-label text-md-right col-12 col-md-3">Thumbnail</label>
										<div class="col-12 col-md-7">
											<img src="{{ asset($konsentrasi->gambar) }}" alt="{{ $konsentrasi->nama }}" style="width: 250px">
										</div>
									</div>x	
									<div class="form-group row mb-4">
										<label for="gambar" class="col-form-label text-md-right col-12 col-md-3">Thumbnail Baru (Opsional)</label>
										<div class="col-12 col-md-7">
											<input type="file" class="form-control" name="gambar" id="gambar">
										</div>
									</div>
									<div class="form-group row mb-4">
										<label class="col-form-label text-md-right col-12 col-md-3"></label>
										<div class="col-12 col-md-7">
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
    <script src="{{ asset('assets/modules/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/modules/choices.js/public/assets/scripts/choices.js') }}"></script>
    
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-tinymce.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-choices.js')}}"></script>
@endsection