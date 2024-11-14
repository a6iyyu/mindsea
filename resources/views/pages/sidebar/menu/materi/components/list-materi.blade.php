<section class="grid grid-cols-1 md:grid-cols-2 gap-8">
    @foreach($materi as $item)
        <div class="rounded-xl border-4 border-blue-200 bg-white p-8 shadow-lg transition-all hover:shadow-xl focus-within:ring-4 focus-within:ring-blue-200">
            <div class="mb-6 flex flex-col lg:flex-row items-center justify-between">
                <div class="flex items-center gap-4">
                    <span class="bg-blue-100 rounded-xl p-5">
                        <i class="fa-solid fa-book text-blue-500 text-3xl"></i>
                    </span>
                </div>
                <div class="flex items-center gap-4 text-base">
                    <span class="flex items-center gap-2 text-gray-600">
                        <i class="fa-solid fa-signal"></i>
                        {{ $item->difficulty_level }}
                    </span>
                </div>
            </div>

            <h3 class="mb-4 text-2xl font-bold text-gray-800">
                {{ $item->title }}
            </h3>
            <p class="mb-6 text-lg leading-relaxed text-gray-600">
                {{ $item->description }}
            </p>

            <a href="{{ route('materi.show', $item->id) }}"
                class="inline-flex items-center gap-3 rounded-xl bg-blue-500 px-6 py-3 text-lg font-medium text-white transition-colors hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-200">
                Mulai Belajar
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    @endforeach
</section>