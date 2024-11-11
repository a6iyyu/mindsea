<section class="rounded-2xl border-4 border-orange-200 bg-white p-8 shadow-lg">
    <div class="flex items-center gap-4 mb-6">
        <span class="bg-orange-100 p-4 rounded-xl">
            <i class="fas fa-chart-bar text-orange-600 text-3xl"></i>
        </span>
        <h2 class="text-2xl font-bold text-gray-800">
            Pencapaianmu
        </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $statistik = [
            [
                "judul" => "Materi Selesai",
                "nilai" => "12",
                "ikon" => "fa-book-reader",
                "warna" => "green"
            ],
            [
                "judul" => "Latihan Dikerjakan",
                "nilai" => "24",
                "ikon" => "fa-tasks",
                "warna" => "blue"
            ],
            [
                "judul" => "Nilai Rata-rata",
                "nilai" => "85",
                "ikon" => "fa-star",
                "warna" => "yellow"
            ]
        ];
        @endphp

        @foreach($statistik as $item)
        <div class="bg-{{ $item['warna'] }}-50 p-6 rounded-xl border-2 border-{{ $item['warna'] }}-200">
            <div class="flex items-center gap-3 mb-4">
                <i class="fas {{ $item['ikon'] }} text-{{ $item['warna'] }}-500 text-2xl"></i>
                <h3 class="text-lg font-semibold text-gray-700">
                    {{ $item['judul'] }}
                </h3>
            </div>
            
            <p class="text-3xl font-bold text-{{ $item['warna'] }}-600">
                {{ $item['nilai'] }}
                @if($item['judul'] === 'Nilai Rata-rata')
                    <span class="text-lg font-normal">/ 100</span>
                @endif
            </p>
        </div>
        @endforeach
    </div>
</section>