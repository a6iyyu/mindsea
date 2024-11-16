<div class="space-y-8">
    <!-- Konten Materi Utama -->
    <div class="bg-blue-50 rounded-2xl border-4 border-blue-200 p-8 shadow-lg hover:shadow-xl transition-shadow" role="article">
        <header class="flex items-center gap-4 mb-8">
            <span class="bg-blue-100 p-4 rounded-xl">
                <i class="fa-solid fa-book text-blue-500 text-3xl"></i>
            </span>
            <h1 class="text-3xl font-bold text-blue-700">
                {{ $mainContent->title }}
            </h1>
            <button onclick="speakText('{{ $mainContent->audio_text }}')" 
                class="p-4 bg-blue-100 rounded-xl hover:bg-blue-200 transition-colors"
                aria-label="Putar audio teks"
                title="Klik untuk mendengarkan teks">
                <i class="fa-solid fa-volume-high text-blue-500 text-2xl"></i>
            </button>
        </header>

        <div class="prose max-w-none bg-white p-6 rounded-xl">
            <div class="text-xl leading-relaxed text-gray-700">
                {!! $mainContent->content !!}
            </div>
        </div>
    </div>

    <!-- Navigasi -->
    <div class="flex justify-between items-center">
        <a href="{{ route('materi.show.introduction', $materi->id) }}"
            class="flex items-center gap-2 text-blue-500 bg-blue-100 rounded-xl px-6 py-4 hover:bg-blue-200 transition-colors"
            aria-label="Kembali ke halaman perkenalan">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Perkenalan</span>
        </a>
        <a href="{{ route('materi.show.exercise', $materi->id) }}"
            class="flex items-center gap-2 text-white bg-orange-500 rounded-xl px-6 py-4 hover:bg-orange-600 transition-colors"
            aria-label="Lanjut ke latihan soal">
            <span>Lanjut ke Latihan Soal</span>
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</div>


