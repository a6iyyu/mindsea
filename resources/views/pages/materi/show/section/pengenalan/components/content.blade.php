<div class="prose max-w-none mt-8 border-4 bg-white border-purple-200 p-6 rounded-xl" role="article">
    <h1 class="text-4xl font-bold text-purple-900 tracking-wide leading-relaxed" aria-level="1">
        {{ $introduction->title }}
    </h1>
    <div class="mt-6 text-lg leading-loose text-gray-900" style="font-family: 'Open Sans', sans-serif;">
        {!! $introduction->content !!}
    </div>

    <div class="mt-6">
        <button onclick="speakText('{{ $introduction->audio_text }}')"
            class="bg-blue-100 p-4 rounded-xl hover:bg-blue-200 focus:ring-4 focus:ring-blue-300 transition-all"
            aria-label="Putar audio teks" title="Klik untuk mendengarkan teks">
            <i class="fa-solid fa-volume-high text-blue-600 text-xl"></i>
            <span class="sr-only">Putar audio</span>
        </button>
    </div>
</div>

<div class="mt-10 flex justify-between items-center">
    <a href="{{ route('materi.show', $materi->id) }}"
        class="text-blue-600 hover:text-blue-800 text-lg font-medium transition-colors focus:ring-4 focus:ring-blue-300 p-2 rounded"
        aria-label="Kembali ke halaman sebelumnya">
        <i class="fa-solid fa-arrow-left mr-2"></i>
        Kembali
    </a>
    <a href="{{ route('materi.show.main', $materi->id) }}"
        class="bg-green-600 text-white px-8 py-4 text-lg font-medium rounded-xl hover:bg-green-700 transition-colors focus:ring-4 focus:ring-green-300"
        aria-label="Lanjut ke materi utama">
        Lanjut ke Materi Utama
        <i class="fa-solid fa-arrow-right ml-2"></i>
    </a>
</div>