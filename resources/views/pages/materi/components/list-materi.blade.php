<section class="grid grid-cols-1 md:grid-cols-2 gap-8">
    @foreach($materi as $item)
        <article class="rounded-xl border-4 {{ $item->progress && $item->progress->is_completed ? 'border-gray-200 bg-gray-50' : 'border-blue-200 bg-white' }} p-8 shadow-lg transition-all hover:shadow-xl focus-within:ring-4 focus-within:ring-blue-200">
            <header class="mb-6 flex flex-col lg:flex-row items-center justify-between">
                <div class="flex items-center gap-4">
                    <span class="{{ $item->progress && $item->progress->is_completed ? 'bg-gray-100' : 'bg-blue-100' }} rounded-xl p-5">
                        <i class="fa-solid fa-book {{ $item->progress && $item->progress->is_completed ? 'text-gray-500' : 'text-blue-500' }} text-3xl"></i>
                    </span>
                </div>
                <div class="flex items-center gap-4 text-base">
                    <span class="flex items-center gap-2 {{ $item->progress && $item->progress->is_completed ? 'text-gray-500' : 'text-gray-600' }}">
                        <i class="fa-solid fa-signal"></i>
                        {{ $item->difficulty_level }}
                    </span>
                </div>
            </header>

            <h3 class="mb-4 text-2xl font-bold {{ $item->progress && $item->progress->is_completed ? 'text-gray-600' : 'text-gray-800' }}">
                {{ $item->title }}
            </h3>
            <p class="mb-6 text-lg leading-relaxed {{ $item->progress && $item->progress->is_completed ? 'text-gray-500' : 'text-gray-600' }}">
                {{ $item->description }}
            </p>

            <footer>
                @if($item->progress && $item->progress->is_completed)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2 text-gray-500">
                            <i class="fa-solid fa-check-circle"></i>
                            <span>Sudah Selesai</span>
                            <time datetime="{{ $item->progress->completed_at }}" class="text-sm">({{ $item->progress->completed_at->diffForHumans() }})</time>
                        </div>
                        <a href="{{ route('materi.show', $item->id) }}" class="flex items-center gap-2 text-blue-500 hover:text-blue-600 transition-colors">
                            <i class="fa-solid fa-rotate"></i>
                            <span>Ulangi</span>
                        </a>
                    </div>
                @else
                    <a href="{{ route('materi.show', $item->id) }}"
                        class="inline-flex items-center gap-3 rounded-xl bg-blue-500 px-6 py-3 text-lg font-medium text-white transition-colors hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-200">
                        Mulai Belajar
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                @endif
            </footer>
        </article>
    @endforeach
</section>