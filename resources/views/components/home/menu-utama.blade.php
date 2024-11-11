<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 mb-12">
    @php
    $menu_items = [
        [
            "judul" => "Materi Belajar",
            "deskripsi" => "Pilih materi yang ingin kamu pelajari",
            "ikon" => "fa-book-open",
            "warna" => "blue",
            "link" => "/materi",
        ],
        [
            "judul" => "Latihan Soal",
            "deskripsi" => "Uji pemahamanmu dengan latihan",
            "ikon" => "fa-pencil-alt",
            "warna" => "green",
            "link" => "/latihan-soal",
        ]
    ];
    @endphp

    @foreach($menu_items as $item)
    <a href="{{ $item['link'] }}" 
       class="group relative p-8 rounded-2xl border-4 border-{{ $item['warna'] }}-200 bg-white shadow-lg hover:shadow-xl transition-all duration-300">
        
        <div class="flex items-center gap-4 mb-6">
            <span class="bg-{{ $item['warna'] }}-100 p-6 rounded-xl">
                <i class="fas {{ $item['ikon'] }} text-{{ $item['warna'] }}-600 text-4xl"></i>
            </span>
        </div>

        <h3 class="text-2xl font-bold text-gray-800 mb-3">
            {{ $item['judul'] }}
        </h3>
        <p class="text-lg text-gray-600">
            {{ $item['deskripsi'] }}
        </p>

        <div class="mt-4 flex items-center gap-2 text-{{ $item['warna'] }}-600">
            <span>Mulai Belajar</span>
            <i class="fas fa-arrow-right transform group-hover:translate-x-2 transition-transform"></i>
        </div>
    </a>
    @endforeach
</section> 