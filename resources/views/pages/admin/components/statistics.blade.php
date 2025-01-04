<section class="mt-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-8">
    <!-- Kartu Total Pengguna -->
    <article class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500 hover:shadow-lg transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Total Pengguna</p>
                <h3 class="text-2xl font-bold">{{ $statistics['total_users'] }}</h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-lg">
                <i class="fas fa-users text-2xl text-blue-500"></i>
            </div>
        </div>
        <!-- Indikator Pertumbuhan -->
        <div class="mt-4 flex items-center gap-2">
            @if($statistics['user_growth'] > 0)
                <span class="text-green-500 text-sm">
                    <i class="fas fa-arrow-up"></i> {{ $statistics['user_growth'] }}%
                </span>
            @else
                <span class="text-red-500 text-sm">
                    <i class="fas fa-arrow-down"></i> {{ abs($statistics['user_growth']) }}%
                </span>
            @endif
            <span class="text-gray-500 text-sm">dari bulan lalu</span>
        </div>
    </article>

    <!-- Kartu Total Materi -->
    <article class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500 hover:shadow-lg transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Total Materi</p>
                <h3 class="text-2xl font-bold">{{ $statistics['total_materials'] }}</h3>
            </div>
            <div class="bg-green-100 p-3 rounded-lg">
                <i class="fas fa-book text-2xl text-green-500"></i>
            </div>
        </div>
        <p class="mt-4 text-sm text-gray-500">
            <span class="font-medium">{{ $statistics['active_materials'] }}</span> materi aktif
        </p>
    </article>

    <!-- Kartu Tingkat Penyelesaian -->
    <article class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500 hover:shadow-lg transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Tingkat Penyelesaian</p>
                <h3 class="text-2xl font-bold">{{ $statistics['completion_rate'] }}%</h3>
            </div>
            <div class="bg-yellow-100 p-3 rounded-lg">
                <i class="fas fa-chart-line text-2xl text-yellow-500"></i>
            </div>
        </div>
        <div class="mt-4 w-full bg-gray-200 rounded-full h-2">
            <div class="bg-yellow-500 h-2 rounded-full" style="width: {{ $statistics['completion_rate'] }}%"></div>
        </div>
    </article>

    <!-- Kartu Rata-rata Nilai -->
    <article class="bg-white p-6 rounded-lg shadow-md border-l-4 border-purple-500 hover:shadow-lg transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Rata-rata Nilai</p>
                <h3 class="text-2xl font-bold">{{ $statistics['average_score'] }}</h3>
            </div>
            <div class="bg-purple-100 p-3 rounded-lg">
                <i class="fas fa-star text-2xl text-purple-500"></i>
            </div>
        </div>
        <p class="mt-4 text-sm text-gray-500">
            dari {{ $statistics['total_exercises'] }} latihan selesai
        </p>
    </article>
</section>