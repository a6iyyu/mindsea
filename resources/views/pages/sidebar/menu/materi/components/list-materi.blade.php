<section class="grid grid-cols-1 md:grid-cols-2 gap-8">
    @php
        $materi = [
            [
                "judul" => "Matematika Dasar",
                "deskripsi" => "Belajar konsep dasar matematika dengan cara yang menyenangkan",
                "level" => "Pemula",
                "durasi" => "2 jam",
                "ikon" => "fa-solid fa-calculator",
                "warna" => "blue",
                "audio" => "matematika.mp3"
            ],
            [
                "judul" => "Bahasa Indonesia",
                "deskripsi" => "Pelajari dasar-dasar bahasa Indonesia dengan metode interaktif",
                "level" => "Pemula",
                "durasi" => "1.5 jam",
                "ikon" => "fa-solid fa-book",
                "warna" => "green",
                "audio" => "bahasa.mp3"
            ],
            [
                "judul" => "Sains Dasar",
                "deskripsi" => "Eksplorasi dunia sains melalui eksperimen sederhana",
                "level" => "Pemula",
                "durasi" => "2.5 jam",
                "ikon" => "fa-solid fa-flask",
                "warna" => "purple",
                "audio" => "sains.mp3"
            ],
            [
                "judul" => "Keterampilan Sosial",
                "deskripsi" => "Belajar berinteraksi dan berkomunikasi dengan baik",
                "level" => "Pemula",
                "durasi" => "1 jam",
                "ikon" => "fa-solid fa-users",
                "warna" => "orange",
                "audio" => "sosial.mp3"
            ]
        ];
    @endphp

    @foreach($materi as $item)
        <div
            class="rounded-xl border-4 border-{{ $item['warna'] }}-200 bg-white p-8 shadow-lg transition-all hover:shadow-xl focus-within:ring-4 focus-within:ring-{{ $item['warna'] }}-200">
            <div class="mb-6 flex flex-col lg:flex-row  items-center justify-between">
                <div class="flex items-center gap-4">
                    <span class="bg-{{ $item['warna'] }}-100 rounded-xl p-5">
                        <i class="{{ $item['ikon'] }} text-{{ $item['warna'] }}-500 text-3xl"></i>
                    </span>
                    <button onclick="playAudio('{{ $item['audio'] }}')"
                        class="rounded-lg bg-{{ $item['warna'] }}-50 p-3 hover:bg-{{ $item['warna'] }}-100 transition-colors"
                        aria-label="Dengarkan deskripsi materi">
                        <i class="fa-solid fa-volume-high text-{{ $item['warna'] }}-500 text-xl"></i>
                    </button>
                </div>
                <div class="flex items-center gap-4 text-base">
                    <span class="flex items-center gap-2 text-gray-600">
                        <i class="fa-regular fa-clock"></i>
                        {{ $item['durasi'] }}
                    </span>
                    <span class="flex items-center gap-2 text-gray-600">
                        <i class="fa-solid fa-signal"></i>
                        {{ $item['level'] }}
                    </span>
                </div>
            </div>

            <h3 class="mb-4 text-2xl font-bold text-gray-800">
                {{ $item['judul'] }}
            </h3>
            <p class="mb-6 text-lg leading-relaxed text-gray-600">
                {{ $item['deskripsi'] }}
            </p>

            <a href="#"
                class="inline-flex items-center gap-3 rounded-xl bg-{{ $item['warna'] }}-500 px-6 py-3 text-lg font-medium text-white transition-colors hover:bg-{{ $item['warna'] }}-600 focus:outline-none focus:ring-4 focus:ring-{{ $item['warna'] }}-200">
                Mulai Belajar
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    @endforeach
</section>