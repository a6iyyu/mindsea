<!-- Konten Materi -->
<section class="grid grid-cols-1 lg:grid-cols-4 gap-8 p-6">
    <!-- Sidebar Materi -->
    <div class="lg:col-span-1 space-y-6">
        <!-- Daftar Isi -->
        <div class="bg-blue-50 rounded-2xl border-4 border-blue-200 p-6 shadow-lg hover:shadow-xl transition-shadow">
            <div class="flex items-center gap-3 mb-6">
                <span class="bg-blue-100 p-3 rounded-xl">
                    <i class="fa-solid fa-list-ul text-blue-500 text-2xl"></i>
                </span>
                <h3 class="text-2xl font-bold text-blue-700">
                    Daftar Isi
                </h3>
                <button onclick="speakText('Daftar Isi')"
                    class="p-3 bg-blue-100 rounded-xl hover:bg-blue-200 transition-colors">
                    <i class="fa-solid fa-volume-high text-blue-500 text-xl"></i>
                </button>
            </div>

            <ul class="space-y-4">
                <li>
                    <a href="#pengenalan"
                        class="flex items-center gap-4 p-4 text-lg bg-white rounded-xl text-blue-600 hover:bg-blue-100 transition-all">
                        <span class="bg-blue-100 p-3 rounded-lg">
                            <i class="fa-solid fa-circle-play text-blue-500"></i>
                        </span>
                        Pengenalan
                    </a>
                </li>
                <li>
                    <a href="#materi"
                        class="flex items-center gap-4 p-4 text-lg bg-white rounded-xl text-green-600 hover:bg-green-100 transition-all">
                        <span class="bg-green-100 p-3 rounded-lg">
                            <i class="fa-solid fa-book text-green-500"></i>
                        </span>
                        Materi Utama
                    </a>
                </li>
                <li>
                    <a href="#latihan"
                        class="flex items-center gap-4 p-4 text-lg bg-white rounded-xl text-purple-600 hover:bg-purple-100 transition-all">
                        <span class="bg-purple-100 p-3 rounded-lg">
                            <i class="fa-solid fa-pencil text-purple-500"></i>
                        </span>
                        Latihan
                    </a>
                </li>
            </ul>
        </div>

        <!-- Kontrol Aksesibilitas -->
        <div class="bg-pink-50 rounded-2xl border-4 border-pink-200 p-6 shadow-lg">
            <div class="flex items-center gap-3 mb-6">
                <span class="bg-pink-100 p-3 rounded-xl">
                    <i class="fa-solid fa-universal-access text-pink-500 text-2xl"></i>
                </span>
                <h4 class="text-xl font-bold text-pink-700">Pengaturan</h4>
            </div>


            <div class="flex items-center gap-2">
                <button
                    class="h-12 w-12 flex items-center gap-2 p-4 bg-white rounded-xl hover:bg-pink-100 transition-all"
                    aria-label="Perbesar Teks">
                    <i class="fa-solid fa-arrow-up text-pink-500 text-xl"></i>
                </button>
                <button
                    class="h-12 w-12 flex items-center gap-2 p-4 bg-white rounded-xl hover:bg-pink-100 transition-all"
                    aria-label="Perkecil Teks">
                    <i class="fa-solid fa-arrow-down text-pink-500 text-xl"></i>
                </button>
                <span class="text-pink-700">Ukuran teks</span>

            </div>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="lg:col-span-3 space-y-8">
        <!-- Pengenalan -->
        <div id="pengenalan"
            class="bg-blue-50 rounded-2xl border-4 border-blue-200 p-8 shadow-lg hover:shadow-xl transition-shadow">
            <div class="flex items-center gap-4 mb-8">
                <span class="bg-blue-100 p-4 rounded-xl">
                    <i class="fa-solid fa-circle-play text-blue-500 text-3xl"></i>
                </span>
                <h2 class="text-3xl font-bold text-blue-700">
                    Pengenalan
                </h2>
                <button onclick="speakText('Pengenalan. ' + document.querySelector('#pengenalan .prose p').textContent)"
                    class="p-4 bg-blue-100 rounded-xl hover:bg-blue-200 transition-colors">
                    <i class="fa-solid fa-volume-high text-blue-500 text-2xl"></i>
                </button>
            </div>
            <div class="prose max-w-none bg-white p-6 rounded-xl">
                <p class="text-xl leading-relaxed text-gray-700">
                    Selamat datang di materi {{ $materi->title }}!
                    Mari kita mulai pembelajaran dengan memahami konsep dasarnya. 😊
                </p>
                <a href="{{ route('materi.show.introduction', $materi->id) }}"
                    class="flex items-center gap-2 mt-4  text-blue-500 bg-blue-100 rounded-xl w-fit px-3 py-3 hover:text-blue-600 transition-colors">Perkenalan
                    materi dulu yuk!
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Materi Utama -->
        <div id="materi"
            class="bg-green-50 rounded-2xl border-4 border-green-200 p-8 shadow-lg hover:shadow-xl transition-shadow">
            <div class="flex items-center gap-4 mb-8">
                <span class="bg-green-100 p-4 rounded-xl">
                    <i class="fa-solid fa-book text-green-500 text-3xl"></i>
                </span>
                <h2 class="text-3xl font-bold text-green-700">
                    Materi Utama
                </h2>
                <button onclick="speakText('Materi Utama. ' + document.querySelector('#materi .prose p').textContent)"
                    class="p-4 bg-green-100 rounded-xl hover:bg-green-200 transition-colors">
                    <i class="fa-solid fa-volume-high text-green-500 text-2xl"></i>
                </button>
            </div>
            <div class="prose max-w-none bg-white p-6 rounded-xl">
                <p class="text-xl leading-relaxed text-gray-700">
                    Konten materi utama akan ditampilkan di sini dengan bahasa yang sederhana dan mudah dipahami. 📚
                </p>
                <a href="{{ route('materi.show.main', $materi->id) }}"
                    class="flex items-center gap-2 mt-4  text-green-500 bg-green-100 rounded-xl w-fit px-3 py-3 hover:text-green-600 transition-colors">Baca
                    lebih lanjut
                    yuk!
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Latihan -->
        <div id="latihan"
            class="bg-purple-50 rounded-2xl border-4 border-purple-200 p-8 shadow-lg hover:shadow-xl transition-shadow">
            <div class="flex items-center gap-4 mb-8">
                <span class="bg-purple-100 p-4 rounded-xl">
                    <i class="fa-solid fa-pencil text-purple-500 text-3xl"></i>
                </span>
                <h2 class="text-3xl font-bold text-purple-700">
                    Latihan
                </h2>
                <button onclick="speakText('Latihan. ' + document.querySelector('#latihan .prose p').textContent)"
                    class="p-4 bg-purple-100 rounded-xl hover:bg-purple-200 transition-colors">
                    <i class="fa-solid fa-volume-high text-purple-500 text-2xl"></i>
                </button>
            </div>
            <div class="prose max-w-none bg-white p-6 rounded-xl">
                <p class="text-xl leading-relaxed text-gray-700">
                    Mari berlatih dengan soal-soal yang menyenangkan! ✏️
                </p>
                <a href="{{ route('materi.show.exercise', $materi->id) }}"
                    class="flex items-center gap-2 mt-4  text-purple-500 bg-purple-100 rounded-xl w-fit px-3 py-3 hover:text-purple-600 transition-colors">
                    Coba kerjakan soal
                    yuk!
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>