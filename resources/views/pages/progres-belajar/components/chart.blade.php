<main class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <article class="bg-white p-6 rounded-xl border-4 border-[#f58a66]/20 shadow-md hover:shadow-lg transition-shadow">
        <header>
            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-chart-pie mr-2 text-[#f58a66]"></i>Progress Overview
            </h3>
        </header>
        <figure>
            <canvas id="progressChart"></canvas>
        </figure>
    </article>

    <article class="bg-white p-6 rounded-xl border-4 flex flex-col border-[#f58a66]/20 shadow-md hover:shadow-lg transition-shadow">
        <header>
            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-book-open mr-2 text-[#f58a66]"></i>Progress per Mata Pelajaran
            </h3>
        </header>
        <figure>
            <canvas id="subjectProgress"></canvas>
        </figure>
    </article>

    <article class="lg:col-span-2 bg-white p-6 rounded-xl border-4 border-[#f58a66]/20 shadow-md hover:shadow-lg transition-shadow">
        <header>
            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-history mr-2 text-[#f58a66]"></i>Aktivitas Terakhir
            </h3>
        </header>
        <section class="space-y-4">
            @php
                $activities = [
                    [
                        'subject' => 'Matematika',
                        'activity' => 'Menyelesaikan Bab Perkalian',
                        'progress' => 85,
                        'color' => 'blue',
                        'icon' => 'fa-calculator'
                    ],
                    [
                        'subject' => 'IPA',
                        'activity' => 'Mempelajari Sistem Tata Surya',
                        'progress' => 60,
                        'color' => 'purple',
                        'icon' => 'fa-flask'
                    ],
                    [
                        'subject' => 'Bahasa Indonesia',
                        'activity' => 'Latihan Membaca Puisi',
                        'progress' => 75,
                        'color' => 'green',
                        'icon' => 'fa-book'
                    ]
                ];
            @endphp

            @foreach($activities as $activity)
                <article class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="flex items-center">
                        <figure class="bg-{{ $activity['color'] }}-100 p-3 rounded-full mr-4">
                            <i class="fas {{ $activity['icon'] }} text-{{ $activity['color'] }}-500"></i>
                        </figure>
                        <div>
                            <h4 class="font-semibold text-gray-800">{{ $activity['subject'] }}</h4>
                            <p class="text-sm text-gray-600">{{ $activity['activity'] }}</p>
                        </div>
                    </div>
                    <div class="w-32">
                        <meter class="w-full h-2 bg-gray-200 rounded-full" min="0" max="100" value="{{ $activity['progress'] }}">
                            <div class="h-2 bg-{{ $activity['color'] }}-500 rounded-full" style="width: {{ $activity['progress'] }}%"></div>
                        </meter>
                        <p class="text-xs text-gray-500 mt-1 text-right">{{ $activity['progress'] }}%</p>
                    </div>
                </article>
            @endforeach
        </section>
    </article>
</main>