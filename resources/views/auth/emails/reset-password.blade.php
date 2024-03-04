<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Pemberitahuan Atur Ulang Password | {{ config('app.name') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-md-8 col-xl-6 offset-md-2 offset-lg-3">
                        <div class="login-brand">
                            <img src="{{ asset('images/kulikoding-logo.png') }}" alt="KuliKoding04" width="100">
                            <img src="{{ asset($sekolah['favicon']) }}" alt="{{ $sekolah['nama_sekolah'] }}" width="100" class="d-inline">
                        </div>
                        <div class="card card-primary px-2 py-2">
                            <div class="card-body">
                                <h4>Halo!</h4>
                                <p class="text-muted">Anda menerima email ini karena kami menerima permintaan pengaturan ulang kata sandi untuk akun Anda.</p>
                                <div class="text-center my-4">
                                    <a href="{{ $resetUrl }}" class="btn btn-lg btn-primary">Atur Ulang Password</a>
                                </div>
                                <p class="text-muted">Tautan pengaturan ulang kata sandi ini akan kedaluwarsa dalam {{ $count }} menit.</p>
                                <p class="text-muted">Jika Anda tidak meminta pengaturan ulang kata sandi, tidak ada tindakan lebih lanjut yang diperlukan.</p>
                                <p class="text-muted">Hormat kami,<br>KuliKoding04 & {{ $sekolah['nama_sekolah'] }}</p>
                                <hr>
                                <p class="text-muted">Jika Anda mengalami masalah saat mengeklik tombol "Atur Ulang Password", salin dan tempelkan URL di bawah ini ke dalam browser web Anda: 
                                    <a href="{{ $resetUrl }}">{{ $resetUrl }}</a>
                                </p>
                            </div>
                        </div>
                        @include('layouts.auth-footer')
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
