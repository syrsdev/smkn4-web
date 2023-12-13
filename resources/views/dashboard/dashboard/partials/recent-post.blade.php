<div class="col-lg-4">
    <div class="card gradient-bottom">
        <div class="card-header">
            <h4>Post Terbaru</h4>
        </div>
        <div class="card-body" id="top-5-scroll">
            <div class="tab-pane fade show active" id="agenda" role="tabpanel">
                <ul class="list-unstyled list-unstyled-border">
                    @foreach ($recentPost as $item)
                        <li class="media">
                            <img class="mr-3 rounded" width="55" src="{{ asset($item->gambar) }}"
                                alt="{{ $item->judul }}">
                            <div class="media-body">
                                <div class="float-right">
                                    <div class="font-weight-600 text-muted text-small">{{ $item->kategori }}
                                    </div>
                                </div>
                                <div class="media-title">{{ $item->judul }}</div>
                                <div class="media-title">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="card-footer pt-3 d-flex justify-content-center">
            <div class="budget-price justify-content-center">
                <div class="budget-price-square bg-primary" data-width="20"></div>
                <div class="budget-price-label">Total Post</div>
            </div>
        </div>
    </div>
</div>