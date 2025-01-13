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
            <div>
                <select id="monthFilter" class="rounded-xl border-2 border-gray-200 p-2">
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}" {{ date('n') == $month ? 'selected' : '' }}>
                            {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                        </option>
                    @endforeach
                </select>
                <select id="yearFilter" class="rounded-xl border-2 border-gray-200 p-2">
                    @foreach(range(date('Y'), date('Y')-2) as $year)
                        <option value="{{ $year }}" {{ date('Y') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <canvas id="monthlyStats" height="100"></canvas>
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
    let chartInstance = null;

    function updateChart(month, year) {
        const canvas = document.getElementById('monthlyStats');
        canvas.style.opacity = '0.5';

        fetch(`/admin/reports/monthly-stats/${year}/${month}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (chartInstance) {
                    chartInstance.destroy();
                }

                chartInstance = new Chart(canvas.getContext('2d'), {
                    type: 'line',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                canvas.style.opacity = '1';
            })
            .catch(error => {
                console.error('Error fetching stats:', error);
                canvas.style.opacity = '1';
            });
    }

    document.getElementById('monthFilter').addEventListener('change', function() {
        const year = document.getElementById('yearFilter').value;
        updateChart(this.value, year);
    });

    document.getElementById('yearFilter').addEventListener('change', function() {
        const month = document.getElementById('monthFilter').value;
        updateChart(month, this.value);
    });

    document.addEventListener('DOMContentLoaded', () => {
        const month = document.getElementById('monthFilter').value;
        const year = document.getElementById('yearFilter').value;
        updateChart(month, year);
    });
</script>