@component("layouts.main-layout", ["judul" => "Materi Utama {$materi['title']} | mindsea", "deskripsi" => $materi['description'], "halaman_khusus" => false])
<main class="min-h-screen px-6 bg-white">
  <figure
    class="border-4 p-8 rounded-2xl transition-shadow shadow-lg bg-orange-50 border-orange-200 lg:hover:shadow-xl">
    <header class="flex flex-col-reverse items-start gap-4 mb-8 lg:flex-row lg:items-center">
      <i class="fa-solid fa-book-open hidden bg-orange-100 p-4 rounded-xl text-orange-500 text-3xl lg:inline"></i>
      <h2 class="text-xl font-bold text-orange-700 lg:text-3xl">
        {{ $mainContent->title }}
      </h2>
      <button onclick="SpeakText('{{ $mainContent->audio_text }}')"
        class="fa-solid fa-volume-high text-lg transition-colors transform rounded-xl p-4 bg-orange-100 text-orange-500 lg:text-2xl lg:hover:bg-orange-200"
        aria-label="Putar audio teks" title="Klik untuk mendengarkan teks"></button>
    </header>
    @if($mainContent->image_path)
    <img src="{{ Storage::url($mainContent->image_path) }}" alt="Gambar Materi Utama" style="max-width: 500px; max-height: 450px; object-fit: cover;"
      class="mb-4 w-full object-cover rounded-xl">
  @endif
    <h4
      class="prose max-w-none bg-transparent rounded-xl text-base leading-relaxed text-gray-700 lg:p-6 lg:text-xl lg:bg-white">
      {!! $mainContent->content !!}
    </h4>
  </figure>
  <nav class="mt-8 flex flex-col justify-between items-center lg:flex-row">
    <a href="{{ route('materi.show.introduction', $materi['id']) }}"
      class="w-full flex items-center justify-center gap-2 text-blue-500 bg-blue-100 rounded-xl px-6 py-4 hover:bg-blue-200 transform transition-colors lg:w-fit"
      aria-label="Kembali ke halaman perkenalan">
      <i class="fa-solid fa-arrow-left"></i>
      <span>Kembali ke Perkenalan</span>
    </a>
    <a href="{{ route('materi.show.exercise', $materi['id']) }}"
      class="mt-4 w-full flex items-center justify-center gap-2 text-white bg-orange-600 rounded-xl px-6 py-4 hover:bg-orange-700 transform transition-colors lg:mt-0 lg:w-fit"
      aria-label="Lanjut ke latihan soal">
      <span>Lanjut ke Latihan Soal</span>
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