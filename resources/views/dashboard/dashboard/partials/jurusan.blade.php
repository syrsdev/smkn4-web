<div class="col-12 col-md-6">
    <div class="card">
        <div class="card-header">
            <h4>Konsentrasi Keahlian</h4>
            <div class="card-header-action">
                <a href="{{ route('konsentrasi.index') }}" class="btn btn-sm btn-primary">
                    Lihat Semua
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (count($jurusan) > 0)
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
                                    @if (strlen($item->program->nama) > 20)
                                        {{ substr($item->program->nama, 0, 20).'...' }}
                                    @else
                                        {{ $item->program->nama }}
                                    @endif
                                    <br>
                                    @if (strlen($item->program->bidang->nama) > 20)
                                        {{ substr($item->program->bidang->nama, 0, 20).'...' }}
                                    @else
                                        {{ $item->program->bidang->nama }}
                                    @endif
                                </div>
                                <div class="product-cta">
                                    <a href="{{ route('konsentrasi.show', $item->slug) }}" class="btn btn-sm btn-primary btn-round">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">Belum ada data :(</p>
            @endif
        </div>
    </div>
</div>
