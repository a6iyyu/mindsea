<section class="bg-white rounded-lg shadow-md p-6 mb-8">
    <header class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-3">
            <div class="bg-blue-100 p-3 rounded-lg">
                <i class="fas fa-history text-blue-600 text-xl"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-800">Aktivitas Terbaru</h2>
        </div>
        <a href="#" class="text-blue-600 hover:underline text-sm">Lihat Semua</a>
    </header>

    <div class="space-y-4">
        @foreach($recentActivities as $activity)
            <div class="flex items-center gap-4 p-4 hover:bg-gray-50 rounded-lg transition-colors">
                <div class="bg-{{ $activity->color }}-100 p-3 rounded-full">
                    <i class="fas {{ $activity->icon }} text-{{ $activity->color }}-600"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-gray-800">{{ $activity->title }}</p>
                    <p class="text-sm text-gray-600">{{ $activity->description }}</p>
                </div>
                <time datetime="{{ $activity->created_at }}" class="text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}
                </time>
            </div>
        @endforeach
    </div>
</section> 