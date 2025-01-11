<header class="flex items-center gap-6 mb-8">
    <span class="relative">
        <i class="fa-solid fa-pencil-alt bg-[#fceede] p-6 rounded-xl inline-block text-[#f58a66] text-4xl"></i>
        <i class="fa-solid fa-star absolute -top-2 -right-2 bg-blue-100 p-2 rounded-full text-blue-500"></i>
    </span>
    <span>
        <h2 class="text-4xl font-bold text-gray-800">Latihan Soal 📝</h2>
        <h5 class="mt-3">
            Yuk, asah kemampuanmu dengan mengerjakan soal-soal seru!
        </h5>
    </span>
</header>

<button
        onclick="window.SpeakText('Latihan Soal, Yuk, asah kemampuanmu dengan mengerjakan soal-soal seru! Soal selesai: {{ $completedExercises }}, nilai tertinggi: {{ $bestScore }}')"
        class="mt-4 mb-4 flex items-center gap-2 px-4 py-2 transform rounded-lg bg-amber-100 text-amber-700 hover:bg-amber-200 transition-colors">
        <i class="fas fa-volume-up" aria-hidden="true"></i>
      <h4>Dengarkan</h4>
</button>