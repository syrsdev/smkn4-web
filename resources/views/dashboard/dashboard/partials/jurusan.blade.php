<div class="col-12 col-md-6">
    <div class="card">
        <div class="card-header">
            <h4>Konsentrasi Keahlian</h4>
        </div>
        <div class="card-body">
            <div class="owl-carousel owl-theme" id="products-carousel">
                @foreach ($jurusan as $item)
                    <div class="product-item">
                        <div class="product-image">
                            <img alt="{{ $item->nama }}" src="{{ asset($item->gambar) }}" class="img-fluid">
                        </div>
                        <div class="product-details">
                            <div class="product-name">
                                <a href="{{ route('konsentrasi.show', $item->slug) }}" class="fw-bold">
                                    {{ $item->nama }}
                                </a>
                            </div>
                            <div class="text-muted text-small">
                                {{ $item->program->nama }}
                                <br>
                                {{ $item->program->bidang->nama }}
                            </div>
                            <div class="product-cta">
                                <a href="{{ route('konsentrasi.show', $item->slug) }}" class="btn btn-sm btn-primary btn-round">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
