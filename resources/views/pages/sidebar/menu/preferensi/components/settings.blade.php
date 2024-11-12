<section class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Preferensi Tampilan -->
    <div class="bg-white p-6 rounded-xl border-4 border-[#f58a66]/20 shadow-md">
        <div class="flex items-center gap-3 mb-6">
            <span class="bg-blue-100 p-3 rounded-lg">
                <i class="fa-solid fa-palette text-blue-500 text-xl"></i>
            </span>
            <h3 class="text-2xl font-semibold text-gray-800">Tampilan</h3>
        </div>

        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <label class=" text-lg text-gray-700">Mode Gelap</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#f58a66]">
                    </div>
                </label>
            </div>

            <div class="flex items-center justify-between">
                <label class="text-lg text-gray-700">Ukuran Font</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-700 text-base rounded-lg focus:ring-[#f58a66] focus:border-[#f58a66] p-2.5">
                    <option value="small">Kecil</option>
                    <option value="medium" selected>Sedang</option>
                    <option value="large">Besar</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Preferensi Pembelajaran -->
    <div class="bg-white p-6 rounded-xl border-4 border-[#f58a66]/20 shadow-md">
        <div class="flex items-center gap-3 mb-6">
            <span class="bg-green-100 p-3 rounded-lg">
                <i class="fa-solid fa-graduation-cap text-green-500 text-xl"></i>
            </span>
            <h3 class="text-2xl font-semibold text-gray-800">Pembelajaran</h3>
        </div>

        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <label class="text-lg text-gray-700">Notifikasi Belajar</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer" checked>
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#f58a66]">
                    </div>
                </label>
            </div>

            <div class="flex items-center justify-between">
                <label class="text-lg text-gray-700">Kesulitan Materi</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-700 text-base rounded-lg focus:ring-[#f58a66] focus:border-[#f58a66] p-2.5">
                    <option value="easy">Mudah</option>
                    <option value="medium" selected>Sedang</option>
                    <option value="hard">Sulit</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Preferensi Notifikasi -->
    <div class="bg-white p-6 rounded-xl border-4 border-[#f58a66]/20 shadow-md">
        <div class="flex items-center gap-3 mb-6">
            <span class="bg-purple-100 p-3 rounded-lg">
                <i class="fa-solid fa-bell text-purple-500 text-xl"></i>
            </span>
            <h3 class="text-2xl font-semibold text-gray-800">Notifikasi</h3>
        </div>

        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <label class="text-lg text-gray-700">Email Notifikasi</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer" checked>
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#f58a66]">
                    </div>
                </label>
            </div>

            <div class="flex items-center justify-between">
                <label class="text-lg text-gray-700">Pengingat Belajar</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-700 text-base rounded-lg focus:ring-[#f58a66] focus:border-[#f58a66] p-2.5">
                    <option value="never">Tidak Pernah</option>
                    <option value="daily" selected>Setiap Hari</option>
                    <option value="weekly">Setiap Minggu</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Preferensi Bahasa -->
    <div class="bg-white text-lg p-6 rounded-xl border-4 border-[#f58a66]/20 shadow-md">
        <div class="flex items-center gap-3 mb-6">
            <span class="bg-yellow-100 p-3 rounded-lg">
                <i class="fa-solid fa-language text-yellow-500 text-xl"></i>
            </span>
            <h3 class="text-2xl font-semibold text-gray-800">Bahasa</h3>
        </div>

        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <label class="text-lg text-gray-700">Terjemahan Otomatis</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#f58a66]">
                    </div>
                </label>
            </div>

            <div class="flex items-center justify-between">
                <label class="text-lg text-gray-700">Bahasa Utama</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-700 text-base rounded-lg focus:ring-[#f58a66] focus:border-[#f58a66] p-2.5">
                    <option value="id" selected>Bahasa Indonesia</option>
                    <option value="en">English</option>
                    <option value="jw">Bahasa Jawa</option>
                </select>
            </div>
        </div>
    </div>
</section>