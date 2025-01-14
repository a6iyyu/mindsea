@component("layouts.main-layout", [
    "judul" => "Permainan | mindsea",
    "deskripsi" => "Permainan edukatif dan menyenangkan di mindsea",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 pt-28 pb-16 bg-white lg:ml-12 lg:py-28 lg:pr-10 lg:pl-60">
    <!-- Header Section -->
    <header class="mb-8">
        <div class="flex items-center gap-4">
            <i class="fa-solid fa-gamepad bg-purple-100 p-4 rounded-xl text-purple-500 text-3xl"></i>
            <div>
                <h1 class="text-2xl font-bold text-gray-800 lg:text-4xl">Permainan Edukatif 🎮</h1>
                <p class="mt-2 text-gray-600">Belajar sambil bermain lebih menyenangkan!</p>
            </div>
        </div>

        <section class="my-4 flex items-center gap-4 bg-[#fceede]/30 rounded-xl p-6 border-2 border-[#f58a66]/20">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-lightbulb bg-[#fceede] p-3 rounded-lg text-[#f58a66] text-2xl"></i>
                <span>
                    <h3 class="text-xl font-semibold text-gray-800 mb-1">
                        Mindsea Assistant
                    </h3>
                    <h5 class="text-gray-600">
                        Permainan yang menarik lainnya akan segera hadir! 😊
                    </h5>
                </span>
            </div>
            <button
                class="fa-solid fa-volume-high text-[#f58a66] text-xl ml-auto bg-[#fceede] p-3 rounded-lg hover:bg-[#f58a66]/20 transition-colors"
                onclick="speakText('Permainan yang menarik lainnya akan segera hadir!')"
                aria-label="Dengarkan tips"></button>
        </section>

        <!-- Audio Button -->
        <button
            onclick="window.SpeakText('Permainan Edukatif. Belajar sambil bermain lebih menyenangkan! Pilih permainan yang ingin kamu mainkan.')"
            class="mt-4 flex items-center gap-2 px-4 py-2 rounded-lg bg-purple-100 text-purple-700 hover:bg-purple-200 transition-colors"
            aria-label="Dengarkan deskripsi">
            <i class="fas fa-volume-up"></i>
            <span>Dengarkan</span>
        </button>
    </header>

    <!-- Games Grid -->
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-8">
        <!-- Game Cards -->
        @include('pages.permainan.components.game-card', [
    'title' => 'Penjumlahan Seru',
    'description' => 'Belajar berhitung dengan cara yang menyenangkan',
    'icon' => 'fa-plus-circle',
    'color' => 'emerald',
    'route' => route('permainan.penjumlahan'),
    'difficulty' => 'Mudah'
])
        @include('pages.permainan.components.game-card', [
    'title' => 'Segera Hadir',
    'description' => '-',
    'icon' => 'fa-hourglass-half',
    'color' => 'gray',
    'route' => '#',
    'difficulty' => '-'
])
    </div>
</main>
@endcomponent