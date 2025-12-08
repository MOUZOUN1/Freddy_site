<!-- resources/views/platform/partials/chart-card.blade.php -->
<div class="bg-white rounded-lg shadow p-4 my-4">
    <h3 class="font-bold mb-2">{{ $title }}</h3>
    <canvas id="chart-{{ \Illuminate\Support\Str::slug($title) }}" height="150"></canvas>
</div>

<!-- Charger Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('chart-{{ \Illuminate\Support\Str::slug($title) }}').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Lun','Mar','Mer','Jeu','Ven','Sam','Dim'],
            datasets: [{
                label: '{{ $title }}',
                data: {!! json_encode($data) !!},
                backgroundColor: 'rgba(54,162,235,0.2)',
                borderColor: 'rgba(54,162,235,1)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
