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
                <form action="{{ route('sub-navbar.update', $item->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label>Nama Sub Navbar</label>
                        <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                        <label>Link</label>
                        <input type="text" class="form-control" name="url" value="{{ $item->url }}">
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