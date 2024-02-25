<script>
    "use strict";

    fetch('/api/dashboard')
        .then(response => response.json())
        .then(data => {
            if (data && data.week && data.week.length > 0) {
                let weekDates = data.week.map(stat => stat.date);
                let weekPosts = data.week.map(stat => stat.post);
                let weekPrestasi = data.week.map(stat => stat.prestasi);

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
            } else {
                document.getElementById("weekStat").style.display = "none";
                document.getElementById("weekStatMessage").style.display = "block";
            }

            if (data && data.month && data.month.length > 0) {
                let monthDates = data.month.map(stat => stat.date);
                let monthPosts = data.month.map(stat => stat.post);
                let monthPrestasi = data.month.map(stat => stat.prestasi);

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
            } else {
                document.getElementById("monthStat").style.display = "none";
                document.getElementById("monthStatMessage").style.display = "block";
            }

            if (data && data.all && data.all.length > 0) {
                let allDates = data.all.map(stat => stat.date);
                let allPosts = data.all.map(stat => stat.post);
                let allPrestasi = data.all.map(stat => stat.prestasi);

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
            } else {
                document.getElementById("allStat").style.display = "none";
                document.getElementById("allStatMessage").style.display = "block";
            }
        });
</script>