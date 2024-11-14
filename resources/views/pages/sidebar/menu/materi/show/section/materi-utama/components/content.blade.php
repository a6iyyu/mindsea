<div class="mt-8 flex justify-between items-center">
    <a href="{{ route('materi.show.introduction', $materi->id) }}"
        class="text-blue-500 hover:text-blue-600 transition-colors">
        <i class="fa-solid fa-arrow-left mr-2"></i>
        Kembali ke Perkenalan
    </a>
    <a href="{{ route('materi.show.exercise', $materi->id) }}"
        class="bg-orange-500 text-white px-6 py-3 rounded-xl hover:bg-orange-600 transition-colors">
        Lanjut ke Latihan Soal
        <i class="fa-solid fa-arrow-right ml-2"></i>
    </a>
</div>

<div class="h-fit mt-8">
    <h1 class="text-3xl font-bold text-purple-700">{{ $mainContent->title }}</h1>
    <div class="prose max-w-none mt-4">{!! $mainContent->content !!}</div>
    <div class="mt-4">
        <button onclick="speakText('{{ $mainContent->audio_text }}')" class="bg-blue-100 p-3 rounded-xl">
            <i class="fa-solid fa-volume-high text-blue-500"></i>
        </button>
    </div>
</div>