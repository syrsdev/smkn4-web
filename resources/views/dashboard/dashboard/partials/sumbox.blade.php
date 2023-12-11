<div class="row">
    <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('post.index', 'agenda') }}">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-thumbtack"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Agenda</h4>
                    </div>
                    <div class="card-body">{{ $sumBox['post']['agenda'] }}</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('post.index', 'artikel') }}">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-secondary bg-secondary">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Artikel</h4>
                    </div>
                    <div class="card-body">{{ $sumBox['post']['artikel'] }}</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('post.index', 'berita') }}">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-success bg-success">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Berita</h4>
                    </div>
                    <div class="card-body">{{ $sumBox['post']['berita'] }}</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('post.index', 'event') }}">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-danger bg-danger">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Event</h4>
                    </div>
                    <div class="card-body">{{ $sumBox['post']['event'] }}</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('prestasi.index') }}">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Prestasi</h4>
                    </div>
                    <div class="card-body">{{ $sumBox['prestasi'] }}</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('konsentrasi.index') }}">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-info bg-info">
                    <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Konsentrasi Keahlian</h4>
                    </div>
                    <div class="card-body">{{ $sumBox['konsentrasi'] }}</div>
                </div>
            </div>
        </a>
    </div>
</div>
