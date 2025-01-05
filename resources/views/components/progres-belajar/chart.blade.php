<main class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <section id="loading-state" class="col-span-1 lg:col-span-2 flex justify-center items-center py-12">
        <div class="flex flex-col items-center gap-4">
            <span class="animate-spin h-12 w-12 border-4 border-[#f58a66] border-t-transparent rounded-full"></span>
            <p class="text-gray-600">Memuat data...</p>
        </div>
    </section>
    <section id="content-state" class="hidden grid grid-cols-1 lg:grid-cols-2 gap-6 w-full lg:w-[200%]">
        @foreach(['chart-pie' => 'Progress Overview', 'history' => 'Aktivitas Terakhir'] as $icon => $title)
            <article class="bg-white p-6 rounded-xl border-4 border-[#f58a66]/20 shadow-md">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">
                    <i class="fas fa-{{ $icon }} mr-2 text-[#f58a66]"></i>{{ $title }}
                </h3>
                @if($icon === 'chart-pie')
                    <canvas id="progressChart" class="flex items-center justify-center"></canvas>
                @else
                    @foreach($recentActivities as $activity)
                        <figure class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center gap-3">
                                <i class="fas {{ $activity->icon }} bg-{{ $activity->color }}-100 p-3 rounded-lg text-{{ $activity->color }}-500"></i>
                                <span>
                                    <h4 class="font-semibold text-gray-800">{{ $activity->title }}</h4>
                                    <p class="text-sm text-gray-600">{{ $activity->description }}</p>
                                </span>
                            </div>
                            <time class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($activity->completed_at)->diffForHumans() }}
                            </time>
                        </figure>
                    @endforeach
                @endif
            </article>
        @endforeach
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            document.getElementById('loading-state').classList.add('hidden');
            document.getElementById('content-state').classList.remove('hidden');
            new Chart(document.getElementById('progressChart').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Selesai', 'Dalam Progress', 'Belum Dimulai'],
                    datasets: [{
                        data: [`{{ $completedPercentage }}`, `{{ $inProgressPercentage }}`, `{{ $notStartedPercentage }}`],
                        backgroundColor: ['#22c55e', '#f59e0b', '#e5e7eb'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' },
                        tooltip: {
                            callbacks: {
                                label: (context) => `${context.label}: ${context.parsed}%`
                            }
                        }
                    },
                    animation: { animateScale: true, animateRotate: true }
                }
            });
        }, 1000);
    });
</script>