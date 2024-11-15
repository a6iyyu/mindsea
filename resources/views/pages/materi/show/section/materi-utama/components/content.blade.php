<div class="h-fit mt-8 p-6 border-4 bg-white border-purple-200 rounded-xl" role="article">
    <h1 class="text-4xl font-bold text-purple-900 tracking-wide leading-relaxed" aria-level="1">
        {{ $mainContent->title }}
    </h1>
    <div class="prose max-w-none mt-6 text-lg leading-loose text-gray-900" 
         style="font-family: 'Open Sans', sans-serif;">
        {!! $mainContent->content !!}
    </div>
    <div class="mt-6">
        <button 
            onclick="speakText('{{ $mainContent->audio_text }}')" 
            class="bg-blue-100 p-4 rounded-xl hover:bg-blue-200 focus:ring-4 focus:ring-blue-300 transition-all"
            aria-label="Putar audio teks"
            title="Klik untuk mendengarkan teks">
            <i class="fa-solid fa-volume-high text-blue-600 text-xl"></i>
            <span class="sr-only">Putar audio</span>
        </button>
    </div>
</div>

<div class="mt-10 flex justify-between items-center">
    <a href="{{ route('materi.show.introduction', $materi->id) }}"
        class="text-blue-600 hover:text-blue-800 text-lg font-medium transition-colors focus:ring-4 focus:ring-blue-300 p-2 rounded"
        aria-label="Kembali ke halaman perkenalan">
        <i class="fa-solid fa-arrow-left mr-2"></i>
        <span>Kembali ke Perkenalan</span>
    </a>
    <a href="{{ route('materi.show.exercise', $materi->id) }}"
        class="bg-orange-500 text-white px-8 py-4 text-lg font-medium rounded-xl hover:bg-orange-600 transition-colors focus:ring-4 focus:ring-orange-300"
        aria-label="Lanjut ke latihan soal">
        <span>Lanjut ke Latihan Soal</span>
        <i class="fa-solid fa-arrow-right ml-2"></i>
    </a>
</div>


