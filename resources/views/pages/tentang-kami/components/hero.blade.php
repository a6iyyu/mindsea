<section class="mb-12">
    <h1 class="text-4xl font-bold text-gray-800">Tentang Kami 🎯</h1>
    <p class="mt-2 text-lg text-gray-600">Mengenal lebih dekat dengan mindsea dan visi misi kami</p>
</section>

<section class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
    <div class="bg-white p-6 rounded-xl border-4 border-[#f58a66]/20 shadow-md">
        <div class="flex items-center gap-3 mb-6">
            <span class="bg-blue-100 p-3 rounded-lg">
                <i class="fa-solid fa-bullseye text-blue-500 text-xl"></i>
            </span>
            <h3 class="text-xl font-semibold text-gray-800">Visi</h3>
        </div>
        <p class="text-gray-600 leading-relaxed">
            Menjadi platform pembelajaran terdepan yang membantu Anak Berkebutuhan Khusus mengembangkan potensi mereka
            secara optimal melalui pendekatan yang inklusif dan inovatif.
        </p>
    </div>

    <div class="bg-white p-6 rounded-xl border-4 border-[#f58a66]/20 shadow-md">
        <div class="flex items-center gap-3 mb-6">
            <span class="bg-green-100 p-3 rounded-lg">
                <i class="fa-solid fa-list-check text-green-500 text-xl"></i>
            </span>
            <h3 class="text-xl font-semibold text-gray-800">Misi</h3>
        </div>
        <ul class="list-disc list-inside text-gray-600 space-y-2">
            <li>Menyediakan materi pembelajaran yang berkualitas dan mudah diakses</li>
            <li>Mengembangkan metode pembelajaran yang adaptif dan menyenangkan</li>
            <li>Membangun komunitas yang inklusif dan suportif</li>
            <li>Mendorong kemandirian dalam belajar</li>
        </ul>
    </div>
</section>

<section class="mb-12">
    <div class="bg-[#fceede]/30 rounded-xl p-8 border-4 border-[#f58a66]/20">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tim Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $team = [
                    [
                        "nama" => "Rafi Abiyyu Airlangga",
                        "jabatan" => "Founder & CEO",
                        "foto" => "https://api.dicebear.com/7.x/avataaars/svg?seed=Felix",
                    ],
                    [
                        "nama" => "Pramudya Surya A P",
                        "jabatan" => "Head of Education",
                        "foto" => "https://api.dicebear.com/7.x/avataaars/svg?seed=Sarah",
                    ],
                    [
                        "nama" => "Farrel Muchammad Kafie",
                        "jabatan" => "Lead Developer",
                        "foto" => "https://api.dicebear.com/7.x/avataaars/svg?seed=Budi",
                    ],
                    [
                        "nama" => "Dosen Pembina",
                        "jabatan" => "Content Specialist",
                        "foto" => "https://api.dicebear.com/7.x/avataaars/svg?seed=Dina",
                    ]
                ];
            @endphp

            @foreach($team as $member)
                <div class="bg-white p-6 rounded-xl text-center">
                    <img src="{{ $member['foto'] }}" alt="{{ $member['nama'] }}"
                        class="w-24 h-24 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $member['nama'] }}</h3>
                    <p class="text-gray-600">{{ $member['jabatan'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="mb-12">
    <div class="bg-white p-8 rounded-xl border-4 border-[#f58a66]/20 shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Hubungi Kami</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <a href="mailto:info@mindsea.com"
                class="flex items-center justify-center gap-3 p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors">
                <i class="fa-solid fa-envelope text-blue-500"></i>
                <span class="text-gray-700">info@mindsea.com</span>
            </a>
            <a href="tel:+6281234567890"
                class="flex items-center justify-center gap-3 p-4 bg-green-50 rounded-xl hover:bg-green-100 transition-colors">
                <i class="fa-solid fa-phone text-green-500"></i>
                <span class="text-gray-700">+62 812 3456 7890</span>
            </a>
            <a href="#"
                class="flex items-center justify-center gap-3 p-4 bg-purple-50 rounded-xl hover:bg-purple-100 transition-colors">
                <i class="fa-solid fa-location-dot text-purple-500"></i>
                <span class="text-gray-700">Malang, Indonesia</span>
            </a>
        </div>
    </div>
</section>