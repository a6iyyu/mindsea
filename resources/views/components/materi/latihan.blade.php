@component("layouts.main-layout", ["judul" => "Latihan Soal {$materi['title']} | mindsea", "deskripsi" => $materi['description'], "halaman_khusus" => false])
<main class="min-h-screen px-6 bg-white">
  <section class="bg-orange-50 rounded-2xl border-4 border-orange-200 p-8 shadow-lg hover:shadow-xl transition-shadow"
    role="article">
    <header class="flex flex-col-reverse items-start gap-4 mb-8 lg:flex-row lg:items-center">
      <i class="fa-solid fa-pencil hidden bg-orange-100 p-4 rounded-xl text-orange-500 text-3xl lg:inline"></i>
      <h2 class="text-xl font-bold text-orange-700 lg:text-3xl">
        {{ $exercise->title }}
      </h2>
      <button onclick="SpeakText('{{ $exercise->audio_text }}')"
        class="fa-solid fa-volume-high text-lg transition-colors transform rounded-xl p-4 bg-orange-100 text-orange-500 lg:text-2xl lg:hover:bg-orange-200"
        aria-label="Putar audio teks" title="Klik untuk mendengarkan teks"></button>
    </header>
    @if($exercise->image_path)
    <img src="{{ Storage::url($exercise->image_path) }}" alt="Gambar Latihan" style="max-width: 500px; max-height: 450px; object-fit: cover;"
      class="mb-4 w-full object-cover rounded-xl">
  @endif
    <h4 class="prose max-w-none bg-white p-6 rounded-xl text-xl leading-relaxed text-gray-700">
      {!! $exercise->content !!}
    </h4>
    <nav class="mt-8 flex flex-col justify-between items-center lg:flex-row">
      <a href="{{ route('materi.show.main', $materi['id']) }}"
        class="w-full flex items-center justify-center gap-2 text-orange-500 bg-orange-100 rounded-xl px-6 py-4 hover:bg-orange-200 transform transition-colors lg:w-fit"
        aria-label="Kembali ke materi utama">
        <i class="fa-solid fa-arrow-left mr-2"></i>
        <h5>
          Kembali <span class="hidden lg:inline">ke Materi Utama</span>
        </h5>
      </a>
      <button onclick="completeContent('{{ $materi->id }}')"
        class="mt-4 w-full flex items-center justify-center gap-2 bg-green-600 text-white px-8 py-4 text-lg font-medium rounded-xl hover:bg-green-700 transition-colors focus:ring-4 focus:ring-green-300 lg:mt-0 lg:w-fit"
        id="complete-btn">
        <span>Selesai</span>
        <i class="fa-solid fa-check"></i>
      </button>
    </nav>
  </section>
</main>
@endcomponent

<script>
  function completeContent(material) {
    const btn = document.getElementById("complete-btn");
    btn.disabled = true;
    btn.innerHTML =
      'Memproses... <i class="fa-solid fa-spinner fa-spin ml-2"></i>';

    fetch(`/materi/${material}/complete`, {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
          .content,
        Accept: "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "success") {
          btn.classList.add("bg-gray-500");
          btn.classList.remove("hover:bg-green-700");
          btn.innerHTML =
            'Sudah Selesai <i class="fa-solid fa-check ml-2"></i>';
          alert(data.message);
          window.location.reload();
        } else {
          btn.disabled = false;
          btn.innerHTML =
            'Selesai <i class="fa-solid fa-check ml-2"></i>';
          alert(data.message);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        btn.disabled = false;
        btn.innerHTML = 'Selesai <i class="fa-solid fa-check ml-2"></i>';
        alert("Terjadi kesalahan saat menyelesaikan materi");
      });
  }

  document.addEventListener("DOMContentLoaded", () => {
    fetch(`/materi/${material}/status`)
      .then((response) => response.json())
      .then((data) => {
        if (data.is_completed) {
          const btn = document.getElementById("complete-btn");
          btn.classList.add("bg-gray-500");
          btn.classList.remove("hover:bg-green-700");
          btn.disabled = true;
          btn.innerHTML =
            'Sudah Selesai <i class="fa-solid fa-check ml-2"></i>';
        }
      });
  });

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
    };
  });
</script>