<section>
    <div class="relative">
        <input type="text" placeholder="Cari mata pelajaran..."
            class="w-full mt-5 px-4 py-3 bg-[#fceede]/30 border-2 border-[#f58a66]/20 rounded-xl shadow-sm focus:outline-none focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors">
        <button class="absolute right-4 top-1/2 -translate-y-1/2 mt-2.5">
            <i class="fa-solid fa-magnifying-glass text-gray-500 hover:text-[#f58a66]"></i>
        </button>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        @php
            $mataPelajaran = [
                [
                    "nama" => "Matematika",
                    "deskripsi" => "Belajar konsep dan pemecahan masalah matematika",
                    "jumlah_bab" => 10,
                    "ikon" => "fa-solid fa-calculator",
                    "warna" => "blue"
                ],
                [
                    "nama" => "Bahasa Indonesia",
                    "deskripsi" => "Meningkatkan kemampuan berbahasa dan sastra",
                    "jumlah_bab" => 8,
                    "ikon" => "fa-solid fa-book",
                    "warna" => "green"
                ],
                [
                    "nama" => "IPA",
                    "deskripsi" => "Eksplorasi ilmu pengetahuan alam",
                    "jumlah_bab" => 12,
                    "ikon" => "fa-solid fa-flask",
                    "warna" => "purple"
                ],
            ]
        @endphp
        @foreach ($mataPelajaran as $mp)
            <a href="#"
                class="mt-5 rounded-xl flex flex-col justify-between border-2 border-{{ $mp['warna'] }}-100 bg-white p-6 shadow-md transition-all hover:shadow-lg">
                <div class="flex items-center gap-4">
                    <div class="rounded-full bg-{{ $mp['warna'] }}-100 p-3">
                        <i
                            class="{{ $mp['ikon'] }} text-xl p-1 w-6 h-6 text-{{ $mp['warna'] }}-500 flex items-center justify-center"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">{{ $mp['nama'] }}</h3>
                        <p class="mt-2 text-gray-600">{{ $mp['deskripsi'] }}</p>
                    </div>
                </div>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-sm text-gray-500">
                        <i class="fa-solid fa-book-open mr-1"></i>
                        {{ $mp['jumlah_bab'] }} Bab
                    </span>
                    <i class="fa-solid fa-arrow-right text-{{ $mp['warna'] }}-500"></i>
                </div>
            </a>
        @endforeach
    </div>
</section>