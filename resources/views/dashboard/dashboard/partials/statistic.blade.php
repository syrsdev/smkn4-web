<script>
    "use strict";

    fetch('/api/dashboard')
        .then(response => response.json())
        .then(data => {
            let weekDates = data.week.map(stat => stat.date);
            let weekPosts = data.week.map(stat => stat.post);
            let weekPrestasi = data.week.map(stat => stat.prestasi);

            let monthDates = data.month.map(stat => stat.date);
            let monthPosts = data.month.map(stat => stat.post);
            let monthPrestasi = data.month.map(stat => stat.prestasi);

            let allDates = data.all.map(stat => stat.date);
            let allPosts = data.all.map(stat => stat.post);
            let allPrestasi = data.all.map(stat => stat.prestasi);

            let weekCtx = document.getElementById("weekStat").getContext('2d');
            new Chart(weekCtx, {
                type: 'line',
                data: {
                    labels: weekDates,
                    datasets: [
                        {
                            label: 'Post',
                            data: weekPosts,
                            borderWidth: 5,
                            backgroundColor: 'transparent',
                            borderColor: '#1A274D',
                            pointBackgroundColor: '#1A274D',
                            pointBorderColor: 'transparent',
                            pointRadius: 5,
                        },
                        {
                            label: 'Prestasi',
                            data: weekPrestasi,
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
                                stepSize: 5
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

            let monthCtx = document.getElementById("monthStat").getContext('2d');
            new Chart(monthCtx, {
                type: 'line',
                data: {
                    labels: monthDates,
                    datasets: [
                        {
                            label: 'Post',
                            data: monthPosts,
                            borderWidth: 5,
                            backgroundColor: 'transparent',
                            borderColor: '#1A274D',
                            pointBackgroundColor: '#1A274D',
                            pointBorderColor: 'transparent',
                            pointRadius: 5,
                        },
                        {
                            label: 'Prestasi',
                            data: monthPrestasi,
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
                                stepSize: 5
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

            let allCtx = document.getElementById("allStat").getContext('2d');
            new Chart(allCtx, {
                type: 'line',
                data: {
                    labels: allDates,
                    datasets: [
                        {
                            label: 'Post',
                            data: allPosts,
                            borderWidth: 5,
                            backgroundColor: 'transparent',
                            borderColor: '#1A274D',
                            pointBackgroundColor: '#1A274D',
                            pointBorderColor: 'transparent',
                            pointRadius: 5,
                        },
                        {
                            label: 'Prestasi',
                            data: allPrestasi,
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
                                stepSize: 5
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