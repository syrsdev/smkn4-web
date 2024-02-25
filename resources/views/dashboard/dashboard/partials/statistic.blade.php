<div class="col-12 col-lg-8">
    <div class="card">
        <div class="card-header">
            <h4>Statistik Post & Prestasi</h4>
            <div class="card-header-action">
                <a href="#week" data-tab="summary-tab" class="btn active">Minggu ini</a>
                <a href="#month" data-tab="summary-tab" class="btn">Bulan ini</a>
                <a href="#all" data-tab="summary-tab" class="btn">Semua</a>
            </div>
        </div>
        <div class="card-body">
            <div class="summary">
                <div class="summary-chart active" data-tab-group="summary-tab" id="week">
                    <canvas id="weekStat" height="150"></canvas>
                    <p id="weekStatMessage" style="display: none;" class="text-center">Belum ada data :(</p>
                </div>
                <div class="summary-chart" data-tab-group="summary-tab" id="month">
                    <canvas id="monthStat" height="150"></canvas>
                    <p id="monthStatMessage" style="display: none;" class="text-center">Belum ada data :(</p>
                </div>
                <div class="summary-chart" data-tab-group="summary-tab" id="all">
                    <canvas id="allStat" height="150"></canvas>
                    <p id="allStatMessage" style="display: none;" class="text-center">Belum ada data :(</p>
                </div>
            </div>
        </div>
    </div>
</div>