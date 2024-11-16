<section class="mb-12">
    <header class="flex items-center gap-6 mb-8">
        <div class="relative">
            <span class="bg-[#fceede] p-6 rounded-xl inline-block">
                <i class="fa-solid fa-pencil-alt text-[#f58a66] text-4xl"></i>
            </span>
            <span class="absolute -top-2 -right-2 bg-blue-100 p-2 rounded-full">
                <i class="fa-solid fa-star text-blue-500"></i>
            </span>
        </div>

        <div>
            <h1 class="flex items-center gap-3">
                <span class="text-4xl font-bold text-gray-800">Latihan Soal</span>
                <span class="text-4xl animate-pulse">📝</span>
            </h1>
            <p class="mt-3 text-xl text-gray-600">
                Yuk, asah kemampuanmu dengan mengerjakan soal-soal seru!
            </p>
        </div>
    </header>

    <main class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <article class="bg-green-50 rounded-xl p-6 border-2 border-green-100">
            <div class="flex items-center gap-4">
                <span class="bg-green-100 p-3 rounded-lg">
                    <i class="fa-solid fa-check-circle text-green-500 text-2xl"></i>
                </span>
                <div>
                    <h2 class="text-green-600 text-lg">Soal Selesai</h2>
                    <p class="text-2xl font-bold text-green-700">24</p>
                </div>
            </div>
        </article>

        <article class="bg-blue-50 rounded-xl p-6 border-2 border-blue-100">
            <div class="flex items-center gap-4">
                <span class="bg-blue-100 p-3 rounded-lg">
                    <i class="fa-solid fa-trophy text-blue-500 text-2xl"></i>
                </span>
                <div>
                    <h2 class="text-blue-600 text-lg">Nilai Terbaik</h2>
                    <p class="text-2xl font-bold text-blue-700">95</p>
                </div>
            </div>
        </article>

        <article class="bg-purple-50 rounded-xl p-6 border-2 border-purple-100">
            <div class="flex items-center gap-4">
                <span class="bg-purple-100 p-3 rounded-lg">
                    <i class="fa-solid fa-clock text-purple-500 text-2xl"></i>
                </span>
                <div>
                    <h2 class="text-purple-600 text-lg">Waktu Belajar</h2>
                    <p class="text-2xl font-bold text-purple-700">2 Jam</p>
                </div>
            </div>
        </article>
    </main>

    <aside class="bg-[#fceede]/30 rounded-xl p-6 border-2 border-[#f58a66]/20">
        <div class="flex items-center gap-4">
            <span class="bg-[#fceede] p-3 rounded-lg">
                <i class="fa-solid fa-lightbulb text-[#f58a66] text-2xl"></i>
            </span>
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-1">Tips Hari Ini!</h3>
                <p class="text-gray-600">Kerjakan soal dengan teliti dan jangan lupa untuk beristirahat ya! 😊</p>
            </div>

            <button onclick="speakText('Kerjakan soal dengan teliti dan jangan lupa untuk beristirahat ya!')"
                class="ml-auto bg-[#fceede] p-3 rounded-lg hover:bg-[#f58a66]/20 transition-colors"
                aria-label="Dengarkan tips">
                <i class="fa-solid fa-volume-high text-[#f58a66] text-xl"></i>
            </button>
        </div>
    </aside>
</section>