<section class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
    @php
        $akses_belajar = [
            ["judul" => "Materi Pembelajaran", "deskripsi" => "Akses berbagai materi pembelajaran yang tersedia.", "ikon" => "fa-solid fa-book", "warna-latar-belakang" => "blue-100", "warna-teks" => "blue-500"],
            ["judul" => "Progres Belajar", "deskripsi" => "Pantau perkembangan pembelajaran Anda.", "ikon" => "fa-solid fa-chart-line", "warna-latar-belakang" => "green-100", "warna-teks" => "green-500"],
            ["judul" => "Preferensi", "deskripsi" => "Sesuaikan preferensi pembelajaran Anda.", "ikon" => "fa-solid fa-book-open-reader", "warna-latar-belakang" => "purple-100", "warna-teks" => "purple-500"],
        ];
    @endphp
    @foreach ($akses_belajar as $item)
        <a href="{{ strtolower(str_replace(" ", "-", $item["judul"])) }}" class="rounded-xl border border-gray-200 bg-white p-6 shadow-md transition-all hover:shadow-lg">
            <div class="mb-4 flex items-center gap-4">
                <span class="bg-{{ $item["warna-latar-belakang"] }} rounded-lg p-4">
                    <i class="{{ $item["ikon"] }} text-{{ $item["warna-teks"] }} text-2xl"></i>
                </span>
                <h3 class="text-xl font-semibold text-gray-800">
                    {{ $item["judul"] }}
                </h3>
            </div>
            <figcaption class="text-gray-600">{{ $item["deskripsi"] }}</figcaption>
        </a>
    @endforeach
</section>