<div class="mt-8 flex justify-between items-center">
    <a href="{{ route('materi.show', $materi->id) }}" class="text-blue-500 hover:text-blue-600 transition-colors">
        <i class="fa-solid fa-arrow-left mr-2"></i>
        Kembali
    </a>
    <a href="{{ route('materi.show.main', $materi->id) }}"
        class="bg-green-500 text-white px-6 py-3 rounded-xl hover:bg-green-600 transition-colors">
        Lanjut ke Materi Utama
        <i class="fa-solid fa-arrow-right ml-2"></i>
    </a>
</div>

<div class="prose max-w-none mt-8">
    <h1 class="text-3xl font-bold text-purple-700">{{ $introduction->title }}</h1>
    <div class="mt-4">{!! $introduction->content !!}</div>

    <div class="mt-4">
        <button onclick="speakText('{{ $introduction->audio_text }}')" class="bg-blue-100 p-3 rounded-xl">
            <i class="fa-solid fa-volume-high text-blue-500"></i>
        </button>
    </div>
</div>