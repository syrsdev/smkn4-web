<div class="col-12 col-md-8">
    <div class="card">
        <div class="card-header">
            <h4>Post Terbaru</h4>
            <div class="card-header-action">
                <a href="{{ route('post.index', $post['latest'][0]->kategori) }}" class="btn btn-primary">
                    Lihat Semua
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive table-invoice">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post['latest'] as $item)
                            <tr>
                                <td>{{ $item->judul }}</td>
                                <td>{{ ucfirst($item->kategori) }}</td>
                                <td>{{ $item->penulis->name }}</td>
                                <td>{{ $item->created_at->format('j-n-Y') }}</td>
                                <td>
                                    <a href="{{ route('post.show', $item->slug) }}" class="btn btn-primary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
