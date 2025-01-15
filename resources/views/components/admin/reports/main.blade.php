<main class="container mx-auto">
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Laporan Statistik</h1>
        <p class="text-gray-600 mt-2">Analisis performa dan aktivitas platform</p>
    </header>

    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $cards = [
                [
                    'title' => 'Rata-rata Nilai',
                    'value' => $performanceStats['average_score'],
                    'suffix' => '%',
                    'icon' => 'fa-star',
                    'color' => 'blue'
                ],
                [
                    'title' => 'Tingkat Penyelesaian',
                    'value' => $performanceStats['completion_rate'],
                    'suffix' => '%',
                    'icon' => 'fa-check-circle',
                    'color' => 'green'
                ],
                [
                    'title' => 'Pengguna Aktif',
                    'value' => $performanceStats['active_users'],
                    'icon' => 'fa-users',
                    'color' => 'yellow'
                ],
                [
                    'title' => 'Total Aktivitas',
                    'value' => $performanceStats['total_activities'],
                    'icon' => 'fa-chart-line',
                    'color' => 'purple'
                ]
            ];
        @endphp

        @foreach($cards as $card)
            <article class="bg-white p-6 rounded-xl border-l-4 border-{{ $card['color'] }}-500 shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h6 class="text-sm text-gray-600">{{ $card['title'] }}</h6>
                        <p class="text-2xl font-bold">
                            {{ $card['value'] }}{{ $card['suffix'] ?? '' }}
                        </p>
                    </div>
                    <i class="fas {{ $card['icon'] }} text-{{ $card['color'] }}-500 text-3xl"></i>
                </div>
            </article>
        @endforeach
    </section>

    <section class="bg-white p-6 rounded-xl border-4 border-gray-200 shadow-md mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Statistik Bulanan</h2>
            <div class="flex gap-2">
                <select id="monthFilter" class="rounded-xl border-2 border-gray-200 p-2 text-sm">
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}" {{ date('n') == $month ? 'selected' : '' }}>
                            {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                        </option>
                    @endforeach
                </select>
                <select id="yearFilter" class="rounded-xl border-2 border-gray-200 p-2 text-sm">
                    @foreach(range(date('Y'), date('Y')-2) as $year)
                        <option value="{{ $year }}" {{ date('Y') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="relative h-[300px]">
            <div id="chart-loading" class="absolute inset-0 flex justify-center items-center bg-white">
                <div class="flex flex-col items-center gap-4">
                    <span class="animate-spin h-8 w-8 border-3 border-blue-500 border-t-transparent rounded-full"></span>
                    <p class="text-gray-600 text-sm">Memuat data...</p>
                </div>
            </div>
            <canvas id="monthlyStats" class="hidden"></canvas>
        </div>
    </section>

    <section class="bg-white p-6 rounded-xl border-4 border-gray-200 shadow-md">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Ringkasan Aktivitas</h2>
        <div class="space-y-4">
            @foreach($activitySummary as $activity)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <span class="text-gray-700">{{ ucfirst(str_replace('_', ' ', $activity->type)) }}</span>
                    <span class="text-blue-500 font-semibold">{{ $activity->count }}</span>
                </div>
            @endforeach
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('monthlyStats').getContext('2d');
    
    const monthlyChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: []
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true,
                        pointStyle: 'circle',
                        generateLabels: function(chart) {
                            const datasets = chart.data.datasets;
                            return datasets.map(function(dataset, i) {
                                return {
                                    text: dataset.label,
                                    fillStyle: dataset.borderColor,
                                    strokeStyle: dataset.borderColor,
                                    lineWidth: 2,
                                    hidden: !chart.isDatasetVisible(i),
                                    index: i,
                                    cursor: 'pointer'
                                };
                            });
                        },
                        font: {
                            size: 12
                        },
                        boxWidth: 30,
                        boxHeight: 30,
                        padding: 15
                    },
                    onClick: function(e, legendItem, legend) {
                        const index = legendItem.index;
                        const chart = legend.chart;
                        const meta = chart.getDatasetMeta(index);

                        meta.hidden = meta.hidden === null ? !chart.data.datasets[index].hidden : null;
                        
                        chart.update();

                        const visibilityStatus = JSON.parse(localStorage.getItem('chartDatasetVisibility') || '{}');
                        visibilityStatus[chart.data.datasets[index].label] = !meta.hidden;
                        localStorage.setItem('chartDatasetVisibility', JSON.stringify(visibilityStatus));
                    }
                },
                tooltip: {
                    enabled: true,
                    mode: 'index',
                    intersect: false,
                    padding: 12,
                    cornerRadius: 4,
                    titleFont: { size: 14 },
                    bodyFont: { size: 13 },
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: ${context.parsed.y} aktivitas`;
                        }
                    },
                    backgroundColor: 'rgba(0, 0, 0, 0.8)'
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: {
                        maxRotation: 0,
                        autoSkip: true,
                        maxTicksLimit: 15,
                        font: { size: 12 }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0,
                        font: { size: 12 }
                    },
                    grid: {
                        borderDash: [2],
                        color: 'rgba(0,0,0,0.1)'
                    }
                }
            }
        }
    });

    function updateChartData(month, year) {
        document.getElementById('chart-loading').classList.remove('hidden');
        document.getElementById('monthlyStats').classList.add('hidden');

        fetch(`/admin/reports/monthly-stats?month=${month}&year=${year}`)
            .then(response => response.json())
            .then(data => {
                const visibilityStatus = JSON.parse(localStorage.getItem('chartDatasetVisibility') || '{}');
                
                data.datasets.forEach(dataset => {
                    if (visibilityStatus.hasOwnProperty(dataset.label)) {
                        dataset.hidden = !visibilityStatus[dataset.label];
                    }
                });

                monthlyChart.data.labels = data.labels;
                monthlyChart.data.datasets = data.datasets;
                monthlyChart.update();

                document.getElementById('chart-loading').classList.add('hidden');
                document.getElementById('monthlyStats').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error fetching chart data:', error);
                alert('Terjadi kesalahan saat memuat data grafik');
            });
    }

    document.getElementById('monthFilter').addEventListener('change', function() {
        updateChartData(this.value, document.getElementById('yearFilter').value);
    });

    document.getElementById('yearFilter').addEventListener('change', function() {
        updateChartData(document.getElementById('monthFilter').value, this.value);
    });

    updateChartData(
        document.getElementById('monthFilter').value,
        document.getElementById('yearFilter').value
    );
});
</script>

