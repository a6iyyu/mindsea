<section class="container mx-auto p-6 shadow-md rounded-lg mt-5 mb-5">
    <header class="flex items-center justify-between">
        <h2 class="text-lg font-bold text-gray-800 lg:text-2xl">Statistik</h2>
        <a href="" class="text-blue-500 hover:text-blue-700 text-sm hover:underline">
            Lihat Semua Statistik
        </a>
    </header>

    <div>
        @include('components.admin.dashboard.statistics', ['statistics' => $statistics])

    </div>
</section>