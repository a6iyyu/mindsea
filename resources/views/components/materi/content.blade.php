<main class="grid grid-cols-1 gap-8 py-6 lg:grid-cols-3">
  <!-- Daftar Isi -->
  <aside class="hidden lg:block">
    <div class="sticky top-24 flex flex-col gap-8">
      <!-- Table of Contents -->
      <figure class="bg-blue-50 rounded-2xl border-4 border-blue-200 p-6 shadow-lg hover:shadow-xl transition-shadow">
        <header class="mb-6 flex items-center justify-between gap-3">
          <h4 class="text-2xl font-bold text-blue-700">Daftar Isi</h4>
          <i onclick="SpeakText('Daftar Isi, pengenalan materi, materi utama, latihan')"
            class="fa-solid fa-volume-high text-blue-500 text-xl p-3 bg-blue-100 rounded-xl hover:bg-blue-200 transition-colors cursor-pointer"></i>
        </header>
        <nav class="flex flex-col gap-4 bg-transparent rounded-xl transition-all lg:gap-2 lg:bg-white">
          <!-- Navigation Links -->
          <a href="#pengenalan" onclick="smoothScroll('pengenalan', event)"
            class="flex items-center gap-4 p-0 text-lg text-blue-600 hover:bg-blue-100 hover:rounded-xl transition-all lg:p-4">
            <i class="fa-solid fa-circle-play text-blue-500 bg-blue-100 p-3 rounded-lg"></i>
            Pengenalan
          </a>
          <a href="#materi" onclick="smoothScroll('materi', event)"
            class="flex items-center gap-4 p-0 text-lg text-green-600 hover:bg-green-100 hover:rounded-xl transition-all lg:p-4">
            <i class="fa-solid fa-book text-green-500 bg-green-100 p-3 rounded-lg"></i>
            Materi Utama
          </a>
          <a href="#latihan" onclick="smoothScroll('latihan', event)"
            class="flex items-center gap-4 p-0 text-lg text-purple-600 hover:bg-purple-100 hover:rounded-xl transition-all lg:p-4">
            <i class="fa-solid fa-pencil text-purple-500 bg-purple-100 p-3 rounded-lg"></i>
            Latihan
          </a>
        </nav>
      </figure>

      <!-- Text Size Settings -->
      <figure class="bg-pink-50 rounded-2xl border-4 border-pink-200 p-6 shadow-lg">
        <header class="flex items-center justify-between mb-6 w-full">
          <div class="flex items-center gap-3">
            <i class="fa-solid fa-universal-access text-pink-500 text-2xl bg-pink-100 p-3 rounded-xl"></i>
            <h3 class="text-xl font-bold text-pink-700">Pengaturan</h3>
          </div>
          <button 
            onclick="SpeakText('Pengaturan ukuran teks, klik tombol minus atau kurang untuk memperkecil teks, klik tombol plus atau tambah untuk memperbesar teks')"
            class="flex items-center justify-center bg-pink-100 text-pink-500 text-xl p-3 rounded-xl hover:bg-pink-200 transition-colors"
            aria-label="Dengarkan petunjuk pengaturan ukuran teks"
          >
            <i class="fa-solid fa-volume-high"></i>
          </button>
        </header>
        <section class="flex items-center gap-2">
          <button onclick="adjustFontSize('decrease')"
            class="h-12 w-12 flex justify-center items-center bg-white text-pink-500 text-xl rounded-xl hover:bg-pink-100 transition-all"
            aria-label="Perkecil Teks">
            <i class="fa-solid fa-minus"></i>
          </button>
          <button onclick="adjustFontSize('increase')"
            class="h-12 w-12 flex justify-center items-center bg-white text-pink-500 text-xl rounded-xl hover:bg-pink-100 transition-all"
            aria-label="Perbesar Teks">
            <i class="fa-solid fa-plus"></i>
          </button>
          <h5 class="text-pink-700">Ukuran teks</h5>
        </section>
      </figure>
    </div>
  </aside>

  <section class="flex flex-col gap-8 lg:col-span-2">
    <!-- Pengenalan -->
    <figure id="pengenalan"
      class="materi-item bg-blue-50 rounded-2xl border-4 border-blue-200 p-8 shadow-lg hover:shadow-xl transition-shadow">
      <header class="flex gap-4 mb-8 flex-col-reverse items-start lg:flex-row lg:items-center">
        <i class="fa-solid fa-circle-play hidden text-blue-500 text-2xl bg-blue-100 p-4 rounded-xl lg:inline"></i>
        <h2 class="text-xl font-bold text-blue-700 lg:text-3xl">
          Pengenalan
        </h2>
        <button onclick="SpeakText('Pengenalan. ' + document.querySelector('#pengenalan .prose h5').textContent + ' ' + document.querySelector('#pengenalan .prose a').textContent)"
          class="p-4 bg-blue-100 rounded-xl hover:bg-blue-200 transition-colors">
          <i class="fa-solid fa-volume-high text-blue-500 text-base lg:text-xl"></i>
        </button>
      </header>
      <div class="prose max-w-none bg-none p-0 rounded-xl lg:bg-white lg:p-4">
        <h5 class="text-base leading-relaxed text-blue-700 lg:text-xl lg:text-gray-700">
          Selamat datang di materi {{ $materi['title'] }}!
          Mari kita mulai pembelajaran dengan memahami konsep dasarnya. 😊
        </h5>
        <a href="{{ route('materi.show.introduction', $materi['id']) }}"
          class="flex items-center gap-2 mt-6 text-blue-500 bg-blue-100 rounded-xl w-fit p-3 hover:text-blue-600 transition-colors">
          Perkenalan materi dulu yuk!
          <i class="fa-solid fa-arrow-right hidden lg:inline"></i>
        </a>
      </div>
    </figure>

    <!-- Materi Utama -->
    <figure id="materi"
      class="bg-green-50 rounded-2xl border-4 border-green-200 p-8 shadow-lg hover:shadow-xl transition-shadow">
      <header class="flex gap-4 mb-8 flex-row items-center">
        <i class="fa-solid fa-book hidden text-green-500 text-2xl bg-green-100 p-4 rounded-xl lg:inline"></i>
        <h2 class="text-xl font-bold text-green-700 lg:text-3xl">
          Materi Utama
        </h2>
        <button onclick="SpeakText('Materi Utama. ' + document.querySelector('#materi .prose p').textContent + ' ' + document.querySelector('#materi .prose a').textContent)"
          class="p-4 bg-green-100 rounded-xl hover:bg-green-200 transition-colors">
          <i class="fa-solid fa-volume-high text-green-500 text-2xl"></i>
        </button>
      </header>
      <div class="prose max-w-none bg-none p-0 rounded-xl lg:bg-white lg:p-4">
        <p class="text-base leading-relaxed text-green-700 lg:text-xl lg:text-gray-700">
          Konten materi utama akan ditampilkan di sini dengan bahasa yang sederhana dan mudah dipahami. 📚
        </p>
        <a href="{{ route('materi.show.main', $materi['id']) }}"
          class="flex items-center gap-2 mt-6 text-green-500 bg-green-100 rounded-xl w-fit p-3 hover:text-green-600 transition-colors">
          Baca lebih lanjut yuk!
          <i class="fa-solid fa-arrow-right hidden lg:inline"></i>
        </a>
      </div>
    </figure>

    <!-- Latihan -->
    <figure id="latihan"
      class="bg-purple-50 rounded-2xl border-4 border-purple-200 p-8 shadow-lg hover:shadow-xl transition-shadow">
      <header class="flex gap-4 mb-8 flex-row items-center">
        <i class="fa-solid fa-pencil hidden text-purple-500 text-2xl bg-purple-100 p-4 rounded-xl lg:inline"></i>
        <h2 class="text-xl font-bold text-purple-700 lg:text-3xl">
          Latihan
        </h2>
        <button onclick="SpeakText('Latihan. ' + document.querySelector('#latihan .prose h5').textContent + ' ' + document.querySelector('#latihan .prose a').textContent)"
          class="p-4 bg-purple-100 rounded-xl hover:bg-purple-200 transition-colors">
          <i class="fa-solid fa-volume-high text-purple-500 text-2xl"></i>
        </button>
      </header>
      <div class="prose max-w-none bg-none p-0 rounded-xl lg:bg-white lg:p-4">
        <h5 class="text-base leading-relaxed text-blue-700 lg:text-xl lg:text-gray-700">
          Mari berlatih dengan soal-soal yang menyenangkan! ✏️
        </h5>
        <a href="{{ route('materi.show.exercise', $materi['id']) }}"
          class="flex items-center gap-2 mt-6 text-purple-500 bg-purple-100 rounded-xl w-fit p-3 hover:text-purple-600 transition-colors">
          Coba kerjakan soal yuk!
          <i class="fa-solid fa-arrow-right hidden lg:inline"></i>
        </a>
      </div>
    </figure>
  </section>
</main>

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

  function smoothScroll(targetId, event) {
    event.preventDefault();

    const targetElement = document.getElementById(targetId);
    const headerOffset = 96;
    const elementPosition = targetElement.getBoundingClientRect().top;
    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

    window.scrollTo({
      top: offsetPosition,
      behavior: 'smooth'
    });

    history.pushState(null, null, `#${targetId}`);
  }

  document.addEventListener('DOMContentLoaded', () => {
    if (window.location.hash) {
      const targetId = window.location.hash.substring(1);
      setTimeout(() => {
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
          const headerOffset = 96;
          const elementPosition = targetElement.getBoundingClientRect().top;
          const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

          window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
          });
        }
      }, 100);
    }
  });

  const DEFAULT_FONT_SIZE = 16;
  const MIN_FONT_SIZE = 12;
  const MAX_FONT_SIZE = 20;

  document.addEventListener('DOMContentLoaded', () => {
    const savedSize = localStorage.getItem('fontSize');
    if (savedSize) {
      document.documentElement.style.fontSize = savedSize + 'px';
    }
  });

  function adjustFontSize(direction) {
    const currentSize = parseFloat(getComputedStyle(document.documentElement).fontSize);

    let newSize;
    if (direction === 'increase') {
      newSize = Math.min(currentSize * 1.1, MAX_FONT_SIZE);
    } else {
      newSize = Math.max(currentSize * 0.9, MIN_FONT_SIZE);
    }

    document.documentElement.style.fontSize = `${newSize}px`;

    localStorage.setItem('fontSize', newSize);

    const button = event.currentTarget;
    button.classList.add('bg-pink-100');
    setTimeout(() => {
      button.classList.remove('bg-pink-100');
    }, 200);
  }
</script>