<div class="col-12 col-md-4">
    <div class="card card-hero">
        <div class="card-header">
            <div class="card-icon">
                <i class="fas fa-signal"></i>
            </div>
            <div class="card-description">Post dan Prestasi dilihat:</div>
            <h4>{{ $post['views'] }} kali</h4>
        </div>
        <div class="card-body p-0">
            <div class="tickets-list">
                @forelse ($post['trending'] as $item)
                    <a href="{{ route('post.show', $item->slug) }}" class="ticket-item">
                        <div class="ticket-title">
                            <h4>{{ $item->judul }}</h4>
                        </div>
                        <div class="ticket-info">
                            <div>{{ $item->penulis->name }}</div>
                            <div class="bullet"></div>
                            <div class="text-primary">{{ $item->created_at->diffForHumans() }}</div>
                        </div>
                    </a>
                @empty
                    <p class="text-center mt-3">Belum ada data :(</p>
                @endforelse
                <a href="{{ route('post.index', $post['trending'][0]->kategori ?? 'berita') }}" class="ticket-item ticket-more">
                    Lihat Semua
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>