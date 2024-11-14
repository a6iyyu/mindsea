<div class="mt-8 flex justify-between items-center">
    <a href="{{ route('materi.show.main', $materi->id) }}"
        class="text-green-500 hover:text-green-600 transition-colors">
        <i class="fa-solid fa-arrow-left mr-2"></i>
        Kembali ke Materi Utama
    </a>
    <a href="{{ route('materi.show', $materi->id) }}"
        class="bg-blue-500 text-white px-6 py-3 rounded-xl hover:bg-blue-600 transition-colors">
        Selesai
        <i class="fa-solid fa-check ml-2"></i>
    </a>
</div>

<div class="h-fit mt-8">
    <h1 class="text-3xl font-bold text-purple-700">{{ $exercise->title }}</h1>
    <div class="prose max-w-none mt-4">{!! $exercise->content !!}</div>
    <div class="mt-4">
        <button onclick="speakText('{{ $exercise->audio_text }}')" class="bg-blue-100 p-3 rounded-xl">
            <i class="fa-solid fa-volume-high text-blue-500"></i>
        </button>
    </div>
</div>