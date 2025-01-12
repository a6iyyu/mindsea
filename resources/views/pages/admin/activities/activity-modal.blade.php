@component('pages.admin.materials.components.modal', ['id' => 'activityModal', 'title' => 'Riwayat Aktivitas'])
    <section class="max-h-[60vh] overflow-y-auto space-y-4 p-2">
        @foreach($activities as $activity)
            <article class="flex items-start gap-4 p-4 rounded-xl border-2 border-gray-100 hover:border-blue-100 transition-colors">
                <div class="flex-shrink-0">
                    @switch($activity->type)
                        @case('material_created')
                            <i class="fas fa-plus-circle text-green-500 text-xl"></i>
                            @break
                        @case('material_updated')
                            <i class="fas fa-edit text-blue-500 text-xl"></i>
                            @break
                        @case('material_deleted')
                            <i class="fas fa-trash text-red-500 text-xl"></i>
                            @break
                        @case('material_completed')
                            <i class="fas fa-check-circle text-green-500 text-xl"></i>
                            @break
                        @default
                            <i class="fas fa-info-circle text-gray-500 text-xl"></i>
                    @endswitch
                </div>
                <div class="flex-1">
                    <h3 class="font-medium text-gray-900">{{ $activity->title }}</h3>
                    <p class="text-gray-600">{{ $activity->description }}</p>
                    <time datetime="{{ $activity->created_at }}" class="text-sm text-gray-500">
                        {{ $activity->created_at->diffForHumans() }}
                    </time>
                </div>
            </article>
        @endforeach
    </section>
    <footer class="mt-6 flex justify-end">
        <button type="button" onclick="close_modal('activityModal')" class="rounded-xl bg-gray-100 px-6 py-3 text-gray-700 hover:bg-gray-200">
            Tutup
        </button>
    </footer>
@endcomponent