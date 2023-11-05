@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Berita</h1>
            </div>
            <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Berita</h4>
                    <!-- Search Bar -->
                    <!-- <div class="d-flex">
                        <input type="text" class="form-control w-40" placeholder="Pencarian..." aria-label="Pencarian...">
                        <button class="btn btn-primary" type="button" id="button-search">
                            <i class='fas fa-search'></i>
                        </button>
                    </div> -->
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tanggal Penulisan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          <tr>
                            <td>
                              1
                            </td>
                            <td>Asesmen dari kementrian bagi siswa klas XII</td>
                            <td>
                              Wildan Ahdian
                            </td>
                            <td>2018-01-20</td>
                            <td><div class="badge badge-success">Publish</div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>Seberapa pentingnya pendidikan moral</td>
                            <td>Achmad Marzukie</td>
                            <td>2018-04-10</td>
                            <td><div class="badge badge-danger">Privasi</div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>
                          <tr>
                            <td>
                              3
                            </td>
                            <td>Backup database</td>
                            <td>Serizawa Purnama</td>
                            <td>2018-01-29</td>
                            <td><div class="badge badge-warning">Dalam pengerjaan</div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection