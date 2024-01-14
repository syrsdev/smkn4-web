@foreach ($subNavbar as $item)
    <div class="modal fade" tabindex="-1" role="dialog" id="editSubNavbar{{$item->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Sub Navbar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('sub-navbar.update', $item->id) }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="form-group">
                            <label for="nama">Nama Sub Navbar</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" name="link" value="{{ $item->url }}" required>
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