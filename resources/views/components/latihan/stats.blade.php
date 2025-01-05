<section class="mb-8 grid grid-cols-1 gap-8 lg:grid-cols-2">
    <article class="flex items-center gap-4 bg-green-50 rounded-xl p-6 border-2 border-green-100">
        <i class="fa-solid fa-check-circle bg-green-100 p-3 rounded-lg text-green-500 text-2xl"></i>
        <span>
            <h2 class="text-green-600 text-lg">Soal Selesai</h2>
            <p class="text-2xl font-bold text-green-700"> {{ $completedExercises }}</p>
        </span>
    </article>
    <article class="flex items-center gap-4 bg-blue-50 rounded-xl p-6 border-2 border-blue-100">
        <i class="fa-solid fa-check-circle bg-blue-100 p-3 rounded-lg text-blue-500 text-2xl"></i>
        <span>
            <h2 class="text-blue-600 text-lg">Soal Selesai</h2>
            <p class="text-2xl font-bold text-blue-700"> {{ $bestScore }}</p>
        </span>
    </article>
</section>