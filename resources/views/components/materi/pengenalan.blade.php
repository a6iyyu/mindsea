@component("layouts.main-layout", ["judul" => "Pengenalan {$materi['title']} | mindsea", "deskripsi" => $materi['description'], "halaman_khusus" => false])
<main class="min-h-screen px-6 bg-white">
  <figure class="border-4 p-8 rounded-2xl transition-shadow shadow-lg bg-purple-50 border-purple-200 lg:hover:shadow-xl">
    <header class="flex flex-col-reverse items-start gap-4 mb-8 lg:flex-row lg:items-center">
      <i class="fa-solid fa-book-open hidden bg-purple-100 p-4 rounded-xl text-purple-500 text-3xl lg:inline"></i>
      <h2 class="text-xl font-bold text-purple-700 lg:text-3xl">
        {{ $introduction->title }}
      </h2>
      <button
        onclick="SpeakText('{{ $introduction->audio_text }}')"
        class="fa-solid fa-volume-high text-lg transition-colors transform rounded-xl p-4 bg-purple-100 text-purple-500 lg:text-2xl lg:hover:bg-purple-200"
        aria-label="Putar audio teks" title="Klik untuk mendengarkan teks"
      ></button>
    </header>
    @if($introduction->image_path)
        <img src="{{ Storage::url($introduction->image_path) }}" alt="Gambar Pengenalan" class="mb-4 w-full object-cover rounded-xl" style="max-width: 500px; max-height: 450px; object-fit: cover;">
    @endif
    <h4 class="prose max-w-none bg-transparent rounded-xl text-base leading-relaxed text-purple-600 lg:p-6 lg:text-xl lg:bg-white lg:text-gray-700">
      {!! $introduction->content !!}
    </h4>
  </figure>
  <nav class="mt-8 flex flex-col justify-between items-center lg:flex-row">
    <a
      href="{{ route('materi.show', $materi['id']) }}"
      class="w-full flex items-center justify-center gap-2 text-purple-500 bg-purple-100 rounded-xl px-6 py-4 hover:bg-purple-200 transform transition-colors lg:w-fit"
    >
      <i class="fa-solid fa-arrow-left"></i>
      <span>Kembali</span>
    </a>
    <a
      href="{{ route('materi.show.main', $materi['id']) }}"
      class="mt-4 w-full flex items-center justify-center gap-2 text-white bg-green-600 rounded-xl px-6 py-4 hover:bg-green-700 transform transition-colors lg:mt-0 lg:w-fit"
    >
      <span>Lanjut ke Materi Utama</span>
      <i class="fa-solid fa-arrow-right"></i>
    </a>
  </nav>
</main>
@endcomponent

<script>
  document.addEventListener("DOMContentLoaded", () => {
    window.SpeakText = (text) => {
      if ("speechSynthesis" in window) {
        const utterance = new SpeechSynthesisUtterance(text);
        utterance.lang = "id-ID";
        utterance.rate = 0.9;
        speechSynthesis.speak(utterance);
      } else {
        alert("Browser kamu tidak mendukung fitur ini");
      }
    }
  });
</script>