<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @php
        $materi = [
            [
                "judul" => "Matematika Dasar",
                "deskripsi" => "Belajar konsep dasar matematika dengan cara yang menyenangkan",
                "level" => "Pemula",
                "durasi" => "2 jam",
                "ikon" => "fa-solid fa-calculator",
                "warna" => "blue"
            ],
            [
                "judul" => "Bahasa Indonesia",
                "deskripsi" => "Pelajari dasar-dasar bahasa Indonesia dengan metode interaktif",
                "level" => "Pemula",
                "durasi" => "1.5 jam",
                "ikon" => "fa-solid fa-book",
                "warna" => "green"
            ],
            [
                "judul" => "Sains Dasar",
                "deskripsi" => "Eksplorasi dunia sains melalui eksperimen sederhana",
                "level" => "Pemula",
                "durasi" => "2.5 jam",
                "ikon" => "fa-solid fa-flask",
                "warna" => "purple"
            ],
            [
                "judul" => "Keterampilan Sosial",
                "deskripsi" => "Belajar berinteraksi dan berkomunikasi dengan baik",
                "level" => "Pemula",
                "durasi" => "1 jam",
                "ikon" => "fa-solid fa-users",
                "warna" => "orange"
            ]
        ];
    @endphp

    @foreach($materi as $item)
        <div
            class="rounded-xl border-2 border-{{ $item['warna'] }}-100 bg-white p-6 shadow-md transition-all hover:shadow-lg">
            <div class="mb-4 flex items-center justify-between">
                <span class="bg-{{ $item['warna'] }}-100 rounded-lg p-4">
                    <i class="{{ $item['ikon'] }} text-{{ $item['warna'] }}-500 text-2xl"></i>
                </span>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-500">
                        <i class="fa-regular fa-clock mr-1"></i>
                        {{ $item['durasi'] }}
                    </span>
                    <span class="text-sm text-gray-500">
                        <i class="fa-solid fa-signal mr-1"></i>
                        {{ $item['level'] }}
                    </span>
                </div>
            </div>

            <h3 class="mb-2 text-xl font-semibold text-gray-800">
                {{ $item['judul'] }}
            </h3>
            <p class="mb-4 text-gray-600">
                {{ $item['deskripsi'] }}
            </p>

            <a href="#" class="inline-flex items-center text-{{ $item['warna'] }}-500 hover:text-{{ $item['warna'] }}-600">
                Mulai Belajar
                <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>
    @endforeach
</section>