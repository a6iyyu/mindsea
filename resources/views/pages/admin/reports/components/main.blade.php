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
        <h2 class="text-xl font-bold text-gray-800 mb-6">Statistik Bulanan</h2>
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
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('monthlyStats').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: @json($monthlyStats),
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    });
</script>