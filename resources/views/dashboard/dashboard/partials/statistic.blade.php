<script>
    "use strict";

    fetch('/api/dashboard')
        .then(response => response.json())
        .then(data => {
            let dates = data.map(stat => stat.date);
            let post = data.map(stat => stat.post);
            let prestasi = data.map(stat => stat.prestasi);

            let ctx = document.getElementById("postPrestasiStat").getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [
                        {
                            label: 'Post',
                            data: post,
                            borderWidth: 5,
                            backgroundColor: 'transparent',
                            borderColor: '#1A274D',
                            pointBackgroundColor: '#1A274D',
                            pointBorderColor: 'transparent',
                            pointRadius: 5,
                        },
                        {
                            label: 'Prestasi',
                            data: prestasi,
                            borderWidth: 5,
                            backgroundColor: 'transparent',
                            borderColor: '#FFD600',
                            pointBackgroundColor: '#FFD600',
                            pointBorderColor: 'transparent',
                            pointRadius: 5,
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                drawBorder: false,
                                color: '#f2f2f2',
                            },
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false
                            }
                        }]
                    },
                }
            });
        });
</script>