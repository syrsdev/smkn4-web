<script>
    "use strict";

    fetch('/api/dashboard')
        .then(response => response.json())
        .then(data => {
            console.log(data);

            let dates = data.map(stat => stat.date);
            let post = data.map(stat => stat.post);
            let prestasi = data.map(stat => stat.prestasi);

            let ctx = document.getElementById("postPrestasi").getContext('2d');
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
                            borderColor: 'rgba(63,82,227,.8)',
                            pointBackgroundColor: 'rgba(63,82,227,.8)',
                            pointBorderColor: 'transparent',
                            pointRadius: 5,
                        },
                        {
                            label: 'Prestasi',
                            data: prestasi,
                            borderWidth: 5,
                            backgroundColor: 'transparent',
                            borderColor: 'rgba(254,86,83,.7)',
                            pointBackgroundColor: 'rgba(254,86,83,.7)',
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