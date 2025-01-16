<section class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Total Pengguna -->
    <figure class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500 transition-all duration-300 ease-in-out lg:hover:shadow-lg">
        <header class="flex items-center justify-between">
            <div>
                <h6 class="text-sm text-gray-600">Total Pengguna</h6>
                <h4 class="text-2xl font-bold">{{ $statistics['total_users'] }}</h4>
            </div>
            <i class="fas fa-users h-14 w-14 grid place-items-center text-xl bg-blue-100 p-3 rounded-lg text-blue-500"></i>
        </header>
        <figcaption class="mt-4 flex items-center gap-2">
            @if($statistics['user_growth'] > 0)
                <span class="text-green-500 text-sm">
                    <i class="fas fa-arrow-up"></i>
                    {{ $statistics['user_growth'] }}%
                </span>
            @else
                <span class="text-red-500 text-sm">
                    <i class="fas fa-arrow-down"></i>
                    {{ abs($statistics['user_growth']) }}%
                </span>
            @endif
            <span class="text-gray-500 text-sm">dari bulan lalu</span>
        </figcaption>
    </figure>

    <!-- Total Materi -->
    <figure class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500 transition-all duration-300 ease-in-out lg:hover:shadow-lg">
        <header class="flex items-center justify-between">
            <div>
                <h6 class="text-sm text-gray-600">Total Materi</h6>
                <h4 class="text-2xl font-bold">{{ $statistics['total_materials'] }}</h4>
            </div>
            <i class="fas fa-book h-14 w-14 grid place-items-center text-xl bg-green-100 p-3 rounded-lg text-green-500"></i>
        </header>
        <figcaption class="mt-4 flex items-center gap-2 text-gray-500 text-sm">
            {{ $statistics['active_materials'] }} materi akun
        </figcaption>
    </figure>

    <!-- Tingkat Penyelesaian -->
    <figure class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500 transition-all duration-300 ease-in-out lg:hover:shadow-lg">
        <header class="flex items-center justify-between">
            <div>
                <h6 class="text-sm text-gray-600">Tingkat Penyelesaian</h6>
                <h4 class="text-2xl font-bold">{{ $statistics['completion_rate'] }}%</h4>
            </div>
            <i class="fas fa-chart-line h-14 w-14 grid place-items-center text-xl bg-yellow-100 p-3 rounded-lg text-yellow-500"></i>
        </header>
        <div class="mt-6 w-full bg-gray-200 rounded-full h-2">
            <div class="bg-yellow-500 h-2 rounded-full" style="width: {{ $statistics['completion_rate'] }}%"></div>
        </div>
    </figure>

    <!-- Rata-rata Nilai -->
    <figure class="bg-white p-6 rounded-lg shadow-md border-l-4 border-purple-500 transition-all duration-300 ease-in-out lg:hover:shadow-lg">
        <header class="flex items-center justify-between">
            <div>
                <h6 class="text-sm text-gray-600">Rata-rata Nilai</h6>
                <h4 class="text-2xl font-bold">{{ $statistics['average_score'] }}</h4>
            </div>
            <i class="fas fa-star h-14 w-14 grid place-items-center text-xl bg-purple-100 p-3 rounded-lg text-purple-500"></i>
        </header>
        <figcaption class="mt-4 flex items-center gap-2 text-gray-500 text-sm">
            dari {{ $statistics['total_exercises'] }} latihan selesai
        </figcaption>
    </figure>
</section>