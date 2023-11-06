@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Tambah Berita</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Posts</a></div>
        <div class="breadcrumb-item">Berita</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Tambah Postingan Baru</h2>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Write Your Post</h4>
            </div>
            <div class="card-body">
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric">
                    <option>Artikel</option>
                    <option>Agenda</option>
                    <option>Berita</option>
                    <option>Event</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konten</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple"></textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                <div class="col-sm-12 col-md-7">
                  <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="image" id="image-upload" />
                  </div>
                </div>
              </div>[]
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric">
                    <option>Publish</option>
                    <option>Draft</option>
                    <option>Pending</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
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
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js')}}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
    <script src="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
@endsection
  <!-- General JS Scripts -->

  <!-- <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script> -->
  
  <!-- JS Libraies -->
  

  <!-- Page Specific JS File -->

  <!-- <script src="assets/js/page/features-post-create.js"></script> -->
  
  <!-- Template JS File -->

  <!-- <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script> -->