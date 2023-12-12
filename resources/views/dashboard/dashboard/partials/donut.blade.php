<script>
    let ctx = document.getElementById("postPrestasiDonut").getContext('2d')
    let myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [{{ $donut['post'] }}, {{ $donut['prestasi'] }}],
                backgroundColor: ['#1A274D', '#FFD600'],
                label: 'Dataset 1'
            }],
            labels: ['Post', 'Prestasi'],
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
        }
    })
</script>
