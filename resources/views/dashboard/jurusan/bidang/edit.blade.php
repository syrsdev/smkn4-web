@foreach ($bidang as $item)
    <div class="modal fade" tabindex="-1" role="dialog" id="editBidang{{ $item->slug }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Bidang Keahlian {{ $item->slug }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('bidang.update', $item->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Bidang Keahlian</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach