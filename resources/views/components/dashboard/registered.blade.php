<main class="grid grid-cols-1 md:grid-cols-3 gap-6">
  @php
  $props = [
    [
    "judul" => "Materi Selesai",
    "warna" => "green",
    "icon" => "fas fa-book-reader",
    "value" => $statistics['completed_materials'],
    "deskripsi" => "materi telah dipelajari",
    ],
    [
    "judul" => "Latihan Dikerjakan",
    "warna" => "blue",
    "icon" => "fas fa-tasks",
    "value" => $statistics['completed_exercises'],
    "deskripsi" => "latihan diselesaikan",
    ],
    [
    "judul" => "Nilai Rata-rata",
    "warna" => "yellow",
    "icon" => "fas fa-star",
    "value" => number_format($statistics['average_score'], 0),
    "deskripsi" => "dari total nilai",
    ]
  ];
@endphp

  @foreach ($props as $prop)
    <article
    class="bg-{{ $prop['warna'] }}-50 p-6 rounded-xl border-2 border-{{ $prop['warna'] }}-200 hover:shadow-lg transition-all duration-300 group">
    <header class="flex items-center gap-4 mb-4">
      <i
      class="{{ $prop['icon'] }} hidden bg-{{ $prop['warna'] }}-100 p-4 rounded-xl group-hover:scale-110 transition-transform duration-300 text-{{ $prop['warna'] }}-500 text-2xl lg:inline"></i>
      <h3 class="text-lg font-semibold text-gray-700">
      {{ $prop['judul'] }}
      </h3>
    </header>
    <section class="space-y-2">
      <p class="text-4xl font-bold text-{{ $prop['warna'] }}-600">
      {{ $prop['value'] }}
      @if ($prop['judul'] === "Nilai Rata-rata")
      <span class="text-lg font-normal">/ 100</span>
    @endif
      </p>
      <p class="text-sm text-gray-500">{{ $prop['deskripsi'] }}</p>

      <button onclick="window.SpeakText('{{ $prop['judul'] }}, {{ $prop['value'] }} {{ $prop['deskripsi'] }}')"
      class="mt-4 flex items-center gap-2 px-4 py-2 transform rounded-lg bg-{{ $prop['warna'] }}-100 text-{{ $prop['warna'] }}-700 hover:bg-{{ $prop['warna'] }}-200 transition-colors">
      <i class="fas fa-volume-up" aria-hidden="true"></i>
      <h4>Dengarkan</h4>
      </button>
    </section>
    </article>
  @endforeach
</main>