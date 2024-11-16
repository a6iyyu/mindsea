<header class="mb-12">
    <h1 class="text-3xl font-bold text-gray-800">Pusat Bantuan 🎯</h1>
    <p class="mt-2 text-gray-600">Kami siap membantu Anda dengan berbagai pertanyaan dan kendala</p>

    <form class="relative mt-6">
        <input type="search" placeholder="Cari bantuan..."
            class="w-full px-4 py-3 bg-[#fceede]/30 border-2 border-[#f58a66]/20 rounded-xl shadow-sm focus:outline-none focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors">
        <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2">
            <i class="fa-solid fa-magnifying-glass text-gray-500 hover:text-[#f58a66]"></i>
        </button>
    </form>
</header>

<main>
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
            <article class="p-6 bg-white rounded-xl border-4 border-[#f58a66]/20 hover:shadow-md transition-all">
                <header class="flex items-center gap-4 mb-4">
                    <span class="bg-[#fceede] p-4 rounded-lg">
                        <i class="{{ $category['icon'] }} text-[#f58a66] text-xl"></i>
                    </span>
                    <h3 class="text-lg font-semibold text-gray-800">{{ $category['title'] }}</h3>
                </header>
                <p class="text-gray-600">{{ $category['desc'] }}</p>
            </article>
        @endforeach
    </section>

    <section class="bg-[#fceede]/30 rounded-xl p-8 border-4 border-[#f58a66]/20">
        <header class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Butuh Bantuan Lebih?</h2>
            <p class="text-gray-600 mt-2">Tim dukungan kami siap membantu Anda 24/7</p>
        </header>

        <nav class="grid md:grid-cols-3 gap-6">
            <a href="#"
                class="flex items-center justify-center gap-3 p-4 bg-white rounded-xl hover:shadow-md transition-all">
                <i class="fa-solid fa-envelope text-[#f58a66]"></i>
                <span class="text-gray-700">support@mindsea.com</span>
            </a>
            <a href="#"
                class="flex items-center justify-center gap-3 p-4 bg-white rounded-xl hover:shadow-md transition-all">
                <i class="fa-solid fa-phone text-[#f58a66]"></i>
                <span class="text-gray-700">+62 812 3456 7890</span>
            </a>
            <a href="#"
                class="flex items-center justify-center gap-3 p-4 bg-white rounded-xl hover:shadow-md transition-all">
                <i class="fa-brands fa-whatsapp text-[#f58a66]"></i>
                <span class="text-gray-700">Chat WhatsApp</span>
            </a>
        </nav>
    </section>
</main>