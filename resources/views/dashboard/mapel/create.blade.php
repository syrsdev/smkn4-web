<div class="modal fade" tabindex="-1" role="dialog" id="tambahMapel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('mapel.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <label>Nama Mata Pelajaran</label>
                    <input type="text" class="form-control" name="nama" value="{{ Session::get('nama') }}">
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
