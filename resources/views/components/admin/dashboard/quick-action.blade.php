<main class="container mx-auto p-6 shadow-md rounded-lg">
    <h2 class="text-lg font-bold text-gray-800 mb-6 lg:text-2xl">Aksi Cepat</h2>
    <section class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <a href="{{ route('admin.materials.index', ['openModal' => 'true']) }}"
            class="flex items-center gap-4 rounded-xl border-2 border-blue-100 bg-blue-50 p-6 transition-all hover:shadow-lg">
            <span class="rounded-xl bg-blue-100 p-4">
                <i class="fa-solid fa-book text-2xl text-blue-500"></i>
            </span>
            <div>
                <h3 class="text-lg font-semibold text-blue-700">Tambah Materi</h3>
                <p class="text-blue-600">Buat materi pembelajaran baru</p>
            </div>
        </a>

        <a href="{{ route('admin.exercises.index', ['openModal' => 'true']) }}"
            class="flex items-center gap-4 rounded-xl border-2 border-purple-100 bg-purple-50 p-6 transition-all hover:shadow-lg">
            <span class="rounded-xl bg-purple-100 p-4">
                <i class="fa-solid fa-pencil text-2xl text-purple-500"></i>
            </span>
            <div>
                <h3 class="text-lg font-semibold text-purple-700">Tambah Latihan</h3>
                <p class="text-purple-600">Buat latihan soal baru</p>
            </div>
        </a>
    </section>
</main>