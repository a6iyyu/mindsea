<section>
    <div class="relative mb-8">
        <label for="search-mapel" class="sr-only">Cari mata pelajaran</label>
        <input 
            type="text" 
            id="search-mapel"
            placeholder="Cari mata pelajaran yang ingin kamu pelajari..." 
            class="w-full px-6 py-4 text-lg bg-[#fceede]/30 border-3 border-[#f58a66]/20 rounded-xl shadow-sm
                   focus:outline-none focus:border-[#f58a66] focus:ring-4 focus:ring-[#f58a66]/20 
                   transition-colors placeholder-gray-500"
            aria-label="Kotak pencarian mata pelajaran">
        <button 
            class="absolute right-6 top-1/2 -translate-y-1/2 p-2 hover:bg-[#f58a66]/10 rounded-lg transition-colors"
            aria-label="Tombol cari mata pelajaran">
            <i class="fa-solid fa-magnifying-glass text-2xl text-[#f58a66]"></i>
        </button>
    </div>

    <div class="flex flex-wrap gap-4 mb-8">
        <button class="px-6 py-3 text-lg bg-[#fceede] text-[#f58a66] rounded-xl hover:bg-[#f58a66]/10 transition-colors">
            <i class="fa-solid fa-calculator mr-2"></i>Matematika
        </button>
        <button class="px-6 py-3 text-lg bg-[#fceede] text-[#f58a66] rounded-xl hover:bg-[#f58a66]/10 transition-colors">
            <i class="fa-solid fa-book mr-2"></i>Bahasa
        </button>
        <button class="px-6 py-3 text-lg bg-[#fceede] text-[#f58a66] rounded-xl hover:bg-[#f58a66]/10 transition-colors">
            <i class="fa-solid fa-flask mr-2"></i>Sains
        </button>
    </div>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-2">
        @php
            $mataPelajaran = [
                [
                    "nama" => "Matematika Dasar",
                    "deskripsi" => "Latihan penjumlahan dan pengurangan sederhana",
                    "level" => "Mudah",
                    "durasi" => "20 menit",
                    "jumlah_soal" => 10,
                    "ikon" => "fa-solid fa-calculator",
                    "warna" => "blue",
                    "audio" => "matematika.mp3"
                ],
                [
                    "nama" => "Membaca Suku Kata",
                    "deskripsi" => "Latihan membaca suku kata sederhana",
                    "level" => "Mudah", 
                    "durasi" => "15 menit",
                    "jumlah_soal" => 8,
                    "ikon" => "fa-solid fa-book",
                    "warna" => "green",
                    "audio" => "membaca.mp3"
                ],
                [
                    "nama" => "Mengenal Hewan",
                    "deskripsi" => "Latihan mengenal berbagai jenis hewan",
                    "level" => "Mudah",
                    "durasi" => "25 menit", 
                    "jumlah_soal" => 12,
                    "ikon" => "fa-solid fa-paw",
                    "warna" => "purple",
                    "audio" => "hewan.mp3"
                ]
            ];
        @endphp

        @foreach($mataPelajaran as $mp)
            <div class="rounded-xl border-4 border-{{ $mp['warna'] }}-200 bg-white p-8 shadow-lg transition-all hover:shadow-xl">
                <div class="mb-6 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <span class="bg-{{ $mp['warna'] }}-100 rounded-xl p-5">
                            <i class="{{ $mp['ikon'] }} text-{{ $mp['warna'] }}-500 text-3xl"></i>
                        </span>
                        <button 
                            onclick="playAudio('{{ $mp['audio'] }}')"
                            class="rounded-lg bg-{{ $mp['warna'] }}-50 p-3 hover:bg-{{ $mp['warna'] }}-100 transition-colors"
                            aria-label="Dengarkan deskripsi soal">
                            <i class="fa-solid fa-volume-high text-{{ $mp['warna'] }}-500 text-xl"></i>
                        </button>
                    </div>
                    <span class="rounded-lg bg-{{ $mp['warna'] }}-50 px-4 py-2 text-{{ $mp['warna'] }}-700">
                        {{ $mp['level'] }}
                    </span>
                </div>

                <h3 class="mb-3 text-2xl font-bold text-gray-800">{{ $mp['nama'] }}</h3>
                <p class="mb-6 text-lg text-gray-600">{{ $mp['deskripsi'] }}</p>

                <div class="mb-6 flex items-center gap-6 text-gray-600">
                    <span class="flex items-center gap-2">
                        <i class="fa-regular fa-clock"></i>
                        {{ $mp['durasi'] }}
                    </span>
                    <span class="flex items-center gap-2">
                        <i class="fa-solid fa-list-check"></i>
                        {{ $mp['jumlah_soal'] }} Soal
                    </span>
                </div>

                <a href="#" 
                   class="inline-flex w-full items-center justify-center gap-3 rounded-xl bg-{{ $mp['warna'] }}-500 px-6 py-4 text-lg font-medium text-white transition-colors hover:bg-{{ $mp['warna'] }}-600">
                    Mulai Latihan
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        @endforeach
    </div>
</section>
