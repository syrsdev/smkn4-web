<div class="row collapse" id="tambahUser">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Tambah User</h4>
            </div>
            <form action="{{ route('user.store') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="level">Level</label>
                            <select class="form-control selectric" id="level" name="level" required>
                                <option disabled selected>Level</option>
                                <option value="admin">Admin</option>
                                <option value="author">Author</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>