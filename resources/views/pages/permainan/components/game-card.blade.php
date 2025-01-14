<article class="group relative overflow-hidden rounded-2xl border-4 border-{{ $color }}-200 bg-white p-6 shadow-lg transition-all hover:shadow-xl">
    <div class="flex items-center gap-4 mb-6">
        <figure class="bg-{{ $color }}-100 p-4 rounded-xl">
            <i class="fas {{ $icon }} text-{{ $color }}-500 text-2xl lg:text-3xl"></i>
        </figure>
        <h2 class="text-xl font-bold text-gray-800">{{ $title }}</h2>
    </div>

    <p class="mb-6 text-gray-600">{{ $description }}</p>

    <!-- Audio Description -->
    <button 
        onclick="window.SpeakText('{{ $title }}. {{ $description }}')"
        class="mb-4 flex items-center gap-2 px-4 py-2 rounded-lg bg-{{ $color }}-50 text-{{ $color }}-700 hover:bg-{{ $color }}-100 transition-colors"
        aria-label="Dengarkan deskripsi permainan"
    >
        <i class="fas fa-volume-up"></i>
        <span>Dengarkan</span>
    </button>

    <!-- Play Button -->
    <a href="{{ $route }}" 
       class="inline-flex items-center gap-2 px-6 py-3 bg-{{ $color }}-500 text-white rounded-xl hover:bg-{{ $color }}-600 transition-colors">
        <i class="fas fa-play"></i>
        <span>Mainkan Sekarang</span>
    </a>

    <!-- Difficulty Level -->
    <div class="absolute top-4 right-4">
        <span class="px-3 py-1 text-sm rounded-full bg-{{ $color }}-50 text-{{ $color }}-700">
            {{ $difficulty }}
        </span>
    </div>
</article>