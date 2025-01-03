<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-12">
    @php
        $categories = [
            [
                "icon" => "fa-solid fa-book",
                "title" => "Panduan Belajar",
                "desc" => "Cara menggunakan fitur pembelajaran"
            ],
            [
                "icon" => "fa-solid fa-gear",
                "title" => "Pengaturan Akun",
                "desc" => "Bantuan seputar akun dan profil"
            ],
            [
                "icon" => "fa-solid fa-shield",
                "title" => "Keamanan",
                "desc" => "Informasi keamanan dan privasi"
            ],
            [
                "icon" => "fa-solid fa-message",
                "title" => "FAQ",
                "desc" => "Pertanyaan yang sering ditanyakan"
            ],
            [
                "icon" => "fa-solid fa-headset",
                "title" => "Kontak Support",
                "desc" => "Hubungi tim dukungan kami"
            ],
            [
                "icon" => "fa-solid fa-circle-info",
                "title" => "Informasi Platform",
                "desc" => "Tentang fitur dan layanan"
            ]
        ];
    @endphp

    @foreach($categories as $category)
        <a href="{{ route('dukungan.show', Str::slug($category['title'])) }}" 
            class="p-6 bg-white rounded-xl border-4 border-[#f58a66]/20 hover:shadow-md transition-all">
            <section class="flex items-center gap-4 mb-4">
                <i class="{{ $category['icon'] }} bg-[#fceede] p-4 rounded-lg text-[#f58a66] text-xl"></i>
                <h3 class="text-lg font-semibold text-gray-800">{{ $category['title'] }}</h3>
            </section>
            <h5 class="text-gray-600">{{ $category['desc'] }}</h5>
        </a>
    @endforeach
</section>