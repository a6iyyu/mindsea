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
    <article
    class="group relative p-8 rounded-2xl border-4 border-{{ $item['warna'] }}-200 bg-white shadow-lg hover:shadow-xl transition-all duration-300">
    <a href="{{ $item['link'] }}">
      <div class="flex items-center gap-4 mb-6">
      <figure class="bg-{{ $item['warna'] }}-100 p-4 rounded-xl lg:p-6">
        <i class="fas {{ $item['ikon'] }} text-{{ $item['warna'] }}-600 text-xl lg:text-4xl"></i>
      </figure>
      </div>
      <h3 class="text-lg font-bold text-gray-800 mb-3 lg:text-2xl">
      {{ $item['judul'] }}
      </h3>
      <h5 class="text-base text-gray-600 lg:text-lg">
      {{ $item['deskripsi'] }}
      </h5>
      <button 
        onclick="event.preventDefault(); window.SpeakText('{{ $item['judul'] }}, {{ $item['deskripsi'] }}')" 
        class="mt-4 flex items-center gap-2 px-4 py-2 transform rounded-lg bg-{{ $item['warna'] }}-100 text-{{ $item['warna'] }}-700 hover:bg-{{ $item['warna'] }}-200 transition-all duration-300"
      >
        <i class="fas fa-volume-up transition-all duration-300" aria-hidden="true"></i>
        <h4>Dengarkan</h4>
      </button>
      <div class="mt-4 flex items-center gap-2 text-{{ $item['warna'] }}-600">
      <h5>Mulai Belajar</h5>
      <i class="fas fa-arrow-right transform group-hover:translate-x-2 transition-transform"></i>
      </div>
    </a>
    </article>
  @endforeach
</section>