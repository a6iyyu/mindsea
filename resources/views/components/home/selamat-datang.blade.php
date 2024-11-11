<section class="mb-12 text-center">
    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 tracking-wide">
        Selamat Datang!
        <span class="inline-block animate-wave">👋</span>
    </h1>

    <img src="{{ asset('images/doge.png') }}" alt="Karakter yang menyambut" class="mx-auto my-6 w-48 h-48"
        aria-hidden="true">

    <div class="mt-4 flex items-center justify-center gap-3">
        <i class="fas fa-lightbulb text-2xl text-yellow-500"></i>
        <h2 class="text-xl md:text-2xl text-gray-700">
            Apa yang ingin kamu pelajari hari ini?
        </h2>
    </div>

    <button onclick="speakText('Selamat datang! Apa yang ingin kamu pelajari hari ini?')"
        class="mt-4 flex items-center gap-2 mx-auto px-4 py-2 rounded-lg bg-blue-100 text-blue-700">
        <i class="fas fa-volume-up"></i>
        <span>Dengarkan</span>
    </button>
</section>