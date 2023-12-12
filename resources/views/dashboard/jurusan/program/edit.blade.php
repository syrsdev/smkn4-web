@foreach ($program as $item)
    <div class="modal fade" tabindex="-1" role="dialog" id="editProgram{{ $item->slug }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Program Keahlian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('program.update', $item->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama program Keahlian</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="id_bidang">Bidang Keahlian</label>
                            <select class="form-control choices" name="id_bidang" id="id_bidang">
                                @foreach ($bidang as $b)
                                    <option value="{{ $b->id }}" {{ $b->id === $item->id_bidang ? 'selected' : '' }}>{{ $b->nama }}</option>
                                @endforeach
                            </select>
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