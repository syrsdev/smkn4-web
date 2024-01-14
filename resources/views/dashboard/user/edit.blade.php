<div class="collapse" id="edit{{ $item->slug }}">
    <div class="section-title">Edit User</div>
    <form action="{{ route('user.update', $item->slug) }}" method="post" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $item->email }}" required>
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <select class="form-control selectric" id="level" name="level" required>
                <option value="admin" {{ $item->level === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="author" {{ $item->level === 'author' ? 'selected' : '' }}>Author</option>
            </select>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
</div>