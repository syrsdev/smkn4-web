<div class="col-12 col-md-6">
    <div class="card">
        <div class="card-header">
            <h4>Tenaga Pendidik dan Kependidikan</h4>
            <div class="card-header-action">
                <a href="{{ route('guru.index') }}" class="btn btn-sm btn-primary">
                    Lihat Semua
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="text-title mb-2">Tenaga Pendidik</div>
                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                        @foreach ($guru['pendidik'] as $item)
                            <li class="media">
                                <img class="img-fluid mt-1 img-shadow" src="{{ $item->gambar }}" alt="{{ $item->nama }}" width="40">
                                <div class="media-body ml-3">
                                    <div class="media-title">
                                        @if (strlen($item->nama) > 15)
                                            <a href="{{ route('guru.edit', $item->slug) }}">
                                                {{ substr($item->nama, 0, 15).'...' }}
                                            </a>
                                        @else
                                            <a href="{{ route('guru.index', $item->slug) }}">
                                                {{ $item->nama }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="text-small text-muted">Guru Produktif</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-6 mt-sm-0 mt-4">
                    <div class="text-title mb-2">Tenaga Kependidikan</div>
                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                        @foreach ($guru['kependidikan'] as $item)
                            <li class="media">
                                <img class="img-fluid mt-1 img-shadow" src="{{ $item->gambar }}" alt="{{ $item->nama }}" width="40">
                                <div class="media-body ml-3">
                                    <div class="media-title">
                                        @if (strlen($item->nama) > 15)
                                            <a href="{{ route('guru.show', $item->slug) }}">
                                                {{ substr($item->nama, 0, 15).'...' }}
                                            </a>
                                        @else
                                            <a href="{{ route('guru.show', $item->slug) }}">
                                                {{ $item->nama }}
                                            </a>    
                                        @endif
                                    </div>
                                    <div class="text-small text-muted">
                                        @if ($item->sub_bagian === 'Kepala Sekolah')
                                            Kepala Sekolah
                                        @else
                                            Staff Kurikulum
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>