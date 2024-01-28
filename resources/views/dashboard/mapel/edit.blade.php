@foreach ($mapel as $item)
    <div class="modal fade" tabindex="-1" role="dialog" id="editMapel{{ $item->slug }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('mapel.update', $item->slug) }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="form-group">
                            <label for="mapel">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" id="mapel" name="mapel" value="{{ $item->nama }}" required>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach