@component("layouts.main-layout", ["judul" => "Pengenalan {$materi->title} | mindsea", "deskripsi" => $materi->description, "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen p-8 px-10 py-28 md:pl-60 relative z-10">
  <section class="bg-purple-50 rounded-2xl border-4 border-purple-200 p-8 shadow-lg hover:shadow-xl transition-shadow">
    <header class="flex items-center gap-4 mb-8">
      <span class="bg-purple-100 p-4 rounded-xl">
        <i class="fa-solid fa-book-open text-purple-500 text-3xl"></i>
      </span>
      <h1 class="text-3xl font-bold text-purple-700">
        {{ $introduction->title }}
      </h1>
      <button onclick="speakText('{{ $introduction->audio_text }}')"
        class="p-4 bg-purple-100 rounded-xl hover:bg-purple-200 transition-colors" aria-label="Putar audio teks"
        title="Klik untuk mendengarkan teks">
        <i class="fa-solid fa-volume-high text-purple-500 text-2xl"></i>
      </button>
    </header>
    <div class="prose max-w-none bg-white p-6 rounded-xl text-xl leading-relaxed text-gray-700">
      {!! $introduction->content !!}
    </div>
  </section>
  <section class="mt-8 flex justify-between items-center">
    <a href="{{ route('materi.show', $materi->id) }}"
      class="flex items-center gap-2 text-purple-500 bg-purple-100 rounded-xl px-6 py-4 hover:bg-purple-200 transition-colors">
      <i class="fa-solid fa-arrow-left"></i>
      <span>Kembali</span>
    </a>
    <a href="{{ route('materi.show.main', $materi->id) }}"
      class="flex items-center gap-2 text-white bg-green-600 rounded-xl px-6 py-4 hover:bg-green-700 transition-colors">
      <span>Lanjut ke Materi Utama</span>
      <i class="fa-solid fa-arrow-right"></i>
    </a>
  </section>
</main>
@endcomponent