<div class="col-12 col-md-4">
    <div class="card">
        <div class="card-header">
            <h4>Post dan Prestasi dilihat:</h4>
        </div>
        <div class="card-body">
            @if ($donut['post'] + $donut['prestasi'] > 0)
                <canvas id="postPrestasiDonut" height="230"></canvas>
            @else
                <p class="text-center">Belum ada data :(</p>
            @endif
        </div>
    </div>
</div>