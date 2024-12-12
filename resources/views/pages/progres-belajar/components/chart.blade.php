<main class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <article class="bg-white p-6 rounded-xl border-4 border-[#f58a66]/20 shadow-md">
        <header>
            <h3 class="text-xl font-semibold text-gray-800 mb-4">
                <i class="fas fa-chart-pie mr-2 text-[#f58a66]"></i>Progress Overview
            </h3>
        </header>
        <figure>
            <canvas id="progressChart"></canvas>
        </figure>
    </article>

    <article class="bg-white p-6 rounded-xl border-4 border-[#f58a66]/20 shadow-md">
        <header>
            <h3 class="text-xl font-semibold text-gray-800 mb-4">
                <i class="fas fa-history mr-2 text-[#f58a66]"></i>Aktivitas Terakhir
            </h3>
        </header>
        <section class="space-y-4">
            @foreach($recentActivities as $activity)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                    <div class="flex items-center gap-3">
                        <span class="bg-{{ $activity->color }}-100 p-3 rounded-lg">
                            <i class="fas {{ $activity->icon }} text-{{ $activity->color }}-500"></i>
                        </span>
                        <div>
                            <h4 class="font-semibold text-gray-800">{{ $activity->title }}</h4>
                            <p class="text-sm text-gray-600">{{ $activity->description }}</p>
                        </div>
                    </div>
                    <time datetime="{{ $activity->completed_at }}" class="text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($activity->completed_at)->diffForHumans() }}
                    </time>
                </div>
            @endforeach
        </section>
    </article>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const progressCtx = document.getElementById('progressChart').getContext('2d');
    
    new Chart(progressCtx, {
        type: 'doughnut',
        data: {
            labels: ['Selesai', 'Dalam Progress', 'Belum Dimulai'],
            datasets: [{
                data: [{{ $completedPercentage }}, {{ $inProgressPercentage }}, {{ $notStartedPercentage }}],
                backgroundColor: ['#22c55e', '#f59e0b', '#e5e7eb'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.parsed + '%';
                        }
                    }
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });
});
</script>