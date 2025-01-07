<section class="bg-white rounded-lg shadow-md p-6 mb-8 overflow-x-auto">
    <header class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-3">
            <i class="fas fa-history text-blue-600 text-xl bg-blue-100 p-3 rounded-lg"></i>
            <h2 class="text-xl font-semibold text-gray-800">Aktivitas Terbaru</h2>
        </div>
        <button onclick="showAllActivities()" class="text-blue-600 hover:underline text-sm">
            Lihat Semua
        </button>
    </header>

    @foreach($recentActivities as $activity)
        <div class="flex items-center gap-4 p-4 hover:bg-gray-50 rounded-lg transition-colors">
            <i class="fas {{ $activity->icon }} text-{{ $activity->color }}-600 bg-{{ $activity->color }}-100 p-3 rounded-full"></i>
            <div class="flex-1">
                <h4 class="font-medium text-gray-800">{{ $activity->title }}</h4>
                <h6 class="text-sm text-gray-600">{{ $activity->description }}</h6>
            </div>
            <time datetime="{{ $activity->created_at }}" class="text-sm text-gray-500">
                {{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}
            </time>
        </div>
    @endforeach
</section>