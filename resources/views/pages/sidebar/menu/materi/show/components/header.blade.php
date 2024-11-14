<section class="mb-3">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('materi.index')}}"
            class="bg-[#fceede] p-4 rounded-xl hover:bg-[#f58a66]/10 transition-colors">
            <i class="fa-solid fa-arrow-left text-[#f58a66] text-2xl"></i>
        </a>
        <div>
            <h1 class="text-4xl font-bold text-gray-800">
                {{ $materi->title }}
            </h1>
            <p class="mt-2 text-xl text-gray-600">
                {{ $materi->description }}
            </p>
        </div>
    </div>

    <div class="flex items-center gap-4 text-gray-600">
        <span class="flex items-center gap-2">
            <i class="fa-solid fa-signal"></i>
            Tingkat Kesulitan: {{ ucfirst($materi->difficulty_level) }}
        </span>
    </div>
</section>