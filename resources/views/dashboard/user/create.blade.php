<div class="row collapse" id="tambahUser">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Tambah User</h4>
            </div>
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="level">Level</label>
                            <select class="form-control selectric" id="level" name="level">
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