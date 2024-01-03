<div class="col-12 col-lg-4">
    <div class="card">
        <div class="card-header">
            <h4>Trending Post</h4>
            <div class="card-header-action">
                <a href="{{ route('post.index', $post['trending'][0]->kategori) }}" class="btn btn-primary">
                    Lihat Semua
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
                @foreach ($post['trending'] as $item)
                    <li class="media">
                        <img class="mr-3 rounded" width="55" src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}">
                        <div class="media-body">
                            <a href="{{ route('post.show', $item->slug) }}">
                                <div class="media-title">{{ substr($item->judul, 0, 25).'...' }}</div>
                            </a>
                            <div class="media-title">{{ $item->created_at->diffForHumans() }}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
