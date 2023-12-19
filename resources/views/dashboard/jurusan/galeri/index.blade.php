<h2 class="section-title">Galeri Konsentrasi Keahlian</h2>
<p class="section-lead">
    This page is just an example for you to create your own page.
</p>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Galeri {{ $konsentrasi->nama }}</h4>
                <div class="card-header-action">
                    <form action="{{ route('galeri.create') }}" method="get">
                        <input type="hidden" name="id_konsentrasi" value="{{ $konsentrasi->id }}">
                        <button type="submit" class="btn btn-icon btn-primary">
                            <i class="fas fa-plus"></i>
                            Tambah Gambar
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="gallery gallery-fw">
                    <div class="row">
                        @foreach ($konsentrasi->galeri as $item)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="gallery-item" data-image="{{ asset($item->gambar) }}"data-title="{{ $item->keterangan }}"></div>
                                <div class="text-center mb-5">
                                    <p>{{ $item->keterangan }}</p>
                                    <form action="{{ route('galeri.edit', $item->id) }}" method="get" class="d-inline">
                                        <input type="hidden" name="id_konsentrasi" value="{{ $konsentrasi->id }}">
                                        <button type="submit" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Gambar">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('galeri.destroy', $item->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" title="Hapus Gambar">
                                        <i class="fas fa-trash" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
