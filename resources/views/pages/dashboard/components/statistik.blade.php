<div
    class="rounded-2xl border-4 border-orange-200 bg-white p-8 shadow-lg hover:shadow-xl transition-all duration-300">
    <header class="flex items-center gap-4 mb-8">
        <div class="relative">
            <span class="bg-orange-100 p-4 rounded-xl inline-block">
                <i class="fas fa-chart-bar text-orange-600 text-3xl"></i>
            </span>
            <span class="absolute -top-2 -right-2 bg-blue-100 p-2 rounded-full">
                <i class="fas fa-star text-blue-500"></i>
            </span>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                Pencapaianmu
            </h2>
            <p class="text-gray-600 mt-1">
                Lihat progres belajarmu sejauh ini
            </p>
        </div>
    </header>

    @auth
        <main class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <article
                class="bg-green-50 p-6 rounded-xl border-2 border-green-200 hover:shadow-lg transition-all duration-300 group">
                <header class="flex items-center gap-4 mb-4">
                    <div
                        class="bg-green-100 p-4 rounded-xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-book-reader text-green-500 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700">
                        Materi Selesai
                    </h3>
                </header>

                <div class="space-y-2">
                    <p class="text-4xl font-bold text-green-600">
                        {{ $statistics['completed_materials'] }}
                    </p>
                    <p class="text-sm text-gray-500">materi telah dipelajari</p>
                </div>
            </article>

            <article
                class="bg-blue-50 p-6 rounded-xl border-2 border-blue-200 hover:shadow-lg transition-all duration-300 group">
                <header class="flex items-center gap-4 mb-4">
                    <div
                        class="bg-blue-100 p-4 rounded-xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-tasks text-blue-500 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700">
                        Latihan Dikerjakan
                    </h3>
                </header>

                <div class="space-y-2">
                    <p class="text-4xl font-bold text-blue-600">
                        {{ $statistics['completed_exercises'] }}
                    </p>
                    <p class="text-sm text-gray-500">latihan diselesaikan</p>
                </div>
            </article>

            <article
                class="bg-yellow-50 p-6 rounded-xl border-2 border-yellow-200 hover:shadow-lg transition-all duration-300 group">
                <header class="flex items-center gap-4 mb-4">
                    <div
                        class="bg-yellow-100 p-4 rounded-xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-star text-yellow-500 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700">
                        Nilai Rata-rata
                    </h3>
                </header>

                <div class="space-y-2">
                    <p class="text-4xl font-bold text-yellow-600">
                        {{ number_format($statistics['average_score'], 0) }}
                        <span class="text-lg font-normal">/ 100</span>
                    </p>
                    <p class="text-sm text-gray-500">dari total nilai</p>
                </div>
            </article>
        </main>
    @else
        <main class="text-center py-12">
            <div class="mb-6">
                <i class="fas fa-lock text-6xl text-orange-400 mb-4 animate-bounce"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">
                Yuk Bergabung Bersama Kami!
            </h3>
            <p class="text-gray-600 mb-6 max-w-md mx-auto">
                Masuk untuk melihat progres belajarmu dan akses fitur-fitur menarik lainnya
            </p>
            <div class="space-x-4">
                <a href="{{ route('login') }}"
                    class="inline-flex items-center px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Masuk Sekarang
                </a>
                <a href="{{ route('register') }}"
                    class="inline-flex items-center px-6 py-3 bg-white border-2 border-orange-500 text-orange-500 rounded-lg hover:bg-orange-50 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-user-plus mr-2"></i>
                    Daftar
                </a>
            </div>
        </main>
    @endauth
</div>