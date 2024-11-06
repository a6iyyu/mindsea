<section class="mt-8 rounded-xl border border-gray-200 bg-white p-6 shadow-md">
    <h2 class="mb-4 text-xl font-semibold text-gray-800">
        Ringkasan Aktivitas
    </h2>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        @php
            $statistik = [
                ["judul" => "Total Materi", "nilai" => "24", "ikon" => "fa-solid fa-book", "warna-latar-belakang" => "bg-orange-50", "warna-teks" => "text-orange-500"],
                ["judul" => "Materi Selesai", "nilai" => "12", "ikon" => "fa-solid fa-check", "warna-latar-belakang" => "bg-blue-50", "warna-teks" => "text-blue-500"],
                ["judul" => "Progres", "nilai" => "50%", "ikon" => "fa-solid fa-chart-line", "warna-latar-belakang" => "bg-green-50", "warna-teks" => "text-green-500"],
            ];
        @endphp
        @foreach ($statistik as $item)
            <span class="rounded-lg bg-orange-50 p-4">
                <h3 class="{{ $item["warna-teks"] }} font-semibold">
                    {{ $item["judul"] }}
                </h3>
                <h5 class="text-2xl font-bold text-gray-800">
                    {{ $item["nilai"] }}
                </h5>
            </span>
        @endforeach
    </div>
</section>