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
					<div class="breadcrumb-item">Post</div>
					<div class="breadcrumb-item">{{ $kategori }}</div>
				</div>
			</div>
			<div class="section-body">
				<h2 class="section-title">Kelola {{ $title }}</h2>
				<p class="section-lead">
					Di halaman ini Anda bisa mengelola dan melihat {{ $title }}.
				</p>
				<div class="row">
					<div class="col-12">
						<div class="card mb-0">
							<div class="card-body">
								<ul class="nav nav-pills">
									<li class="nav-item">
										<a class="nav-link {{ $kategori === 'Agenda' ? 'active' : '' }}" href="{{ route('post.index', 'agenda') }}">Agenda 
											<span class="badge badge-{{ $kategori === 'Agenda' ? 'white' : 'primary' }}">{{ $total['agenda'] }}</span>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link {{ $kategori === 'Artikel' ? 'active' : '' }}" href="{{ route('post.index', 'artikel') }}">Artikel 
											<span class="badge badge-{{ $kategori === 'Artikel' ? 'white' : 'primary' }}">{{ $total['artikel'] }}</span>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link {{ $kategori === 'Berita' ? 'active' : '' }}" href="{{ route('post.index', 'berita') }}">Berita 
											<span class="badge badge-{{ $kategori === 'Berita' ? 'white' : 'primary' }}">{{ $total['berita'] }}</span>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link {{ $kategori === 'Event' ? 'active' : '' }}" href="{{ route('post.index', 'event') }}">Event 
											<span class="badge badge-{{ $kategori === 'Event' ? 'white' : 'primary' }}">{{ $total['event'] }}</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4>{{ $title }}</h4>
								<div class="card-header-action">
									<a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">
										<i class="fas fa-plus"></i>
										Tambah {{ $kategori }}
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped" id="table-1">
										<thead>
											<tr>
												<th>#</th>
												<th>Judul {{ $kategori }}</th>
												<th>Penulis</th>
												<th>Tanggal</th>
												<th>Views</th>
												<th>Publish</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($post as $item)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{ $item->judul }}</td>
													<td>{{ $item->penulis->name }}</td>
													<td>{{ $item->created_at->format('j/n/Y') }}</td>
													<td>{{ $item->views ? $item->views : 0 }}</td>
													<td>
														<form action="{{ route('post.status', $item->slug) }}" method="GET">
															@csrf
															<input type="hidden" name="status" value="{{ $item->status === 1 ? 0 : 1 }}">
															<label class="custom-switch mt-1">
																<input type="checkbox" class="custom-switch-input" {{ $item->status === 1 ? 'checked' : '' }} onclick="this.form.submit()">
																<span class="custom-switch-indicator"></span>
															</label>
														</form>
													</td>
													<td>
														<div class="badge badge-{{ $item->slug }} {{ $item->status === 1 ? 'badge-success' : 'badge-warning' }}">
                                                            {{ $item->status === 1 ? 'Published' : 'Draft' }}
                                                        </div>
													</td>
													<td>
														<a href="{{ route('post.show', $item->slug) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat {{ $kategori }}">
															<i class="fas fa-eye"></i>
														</a>
														<a href="{{ route('post.edit', $item->slug) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit {{ $kategori }}">
															<i class="fas fa-pen"></i>
														</a>
														<a href="{{ route('post.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true"  data-toggle="tooltip" title="Hapus {{ $kategori }}">
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
@endsection