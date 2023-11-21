@foreach ($sosmed as $item)
    <div class="modal fade" tabindex="-1" role="dialog" id="editSosmed{{ $item->name }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Link {{ $item->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('sosmed.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="url">Link</label>
                            <input type="text" class="form-control" id="url" name="url" value="{{ $item->url }}">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary">Edit Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach