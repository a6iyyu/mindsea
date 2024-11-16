<header class="mb-6 bg-purple-50 rounded-2xl border-4 border-purple-200 p-6 shadow-lg hover:shadow-xl transition-shadow">
    <nav class="mb-6">
        <a href="{{ route('materi.index')}}"
            class="flex items-center gap-2 text-purple-500 bg-purple-100 rounded-xl w-fit px-4 py-3 hover:bg-purple-200 transition-colors">
            <i class="fa-solid fa-arrow-left text-2xl" aria-hidden="true"></i>
            <span>Kembali ke daftar materi</span>
        </a>
    </nav>
    <div class="flex flex-col md:flex-row items-center gap-8">
        <article class="text-center md:text-left flex-1">
            <header class="flex items-center gap-4 mb-6">
                <span class="bg-purple-100 p-4 rounded-xl">
                    <i class="fa-solid fa-book-open text-purple-500 text-3xl"></i>
                </span>
                <h1 class="text-3xl md:text-4xl font-bold text-purple-700">
                    {{ $materi->title }}
                </h1>
            </header>
            <p class="text-xl text-gray-700 bg-white p-6 rounded-xl">
                {{ $materi->description }}
            </p>
        </article>
        <img src="{{ asset('images/cute-mascot.png') }}" alt="Maskot Lucu"
            class="w-32 h-32 md:w-48 md:h-48 object-cover rounded-xl border-4 border-purple-200 shadow-md">
    </div>

    <footer class="mt-6">
        <div class="flex items-center gap-4 bg-white p-6 rounded-xl">
            <span class="bg-yellow-100 p-3 rounded-xl">
                <i class="fa-solid fa-star text-yellow-500 text-2xl" aria-hidden="true"></i>
            </span>
            <span class="text-xl">
                Tingkat Kesulitan:
                <span class="font-bold text-purple-600">{{ ucfirst($materi->difficulty_level) }}</span>
            </span>
        </div>
    </footer>
</header>