<!-- Materi Pembelajaran -->
<section class="flex flex-col gap-4 lg:flex-row lg:items-center mb-12">
  <i class="fa-solid fa-book-open w-fit bg-[#fceede] p-4 rounded-xl text-[#f58a66] text-3xl" aria-hidden="true"></i>
  <div>
    <h2 class="text-xl font-bold text-gray-800 lg:text-4xl">Materi Pembelajaran 📚</h2>
    <h5 class="mt-2 text-xl text-gray-600">Pilih materi yang ingin kamu pelajari</h5>
  </div>
</section>

<!-- Statistik Pembelajaran -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
  <div class="bg-[#fceede]/30 rounded-xl p-6 border-2 border-[#f58a66]/20">
    <div class="flex items-center gap-3">
      <i class="fa-solid fa-book-open-reader bg-[#fceede] p-3 rounded-lg text-[#f58a66] text-xl"></i>
      <div>
        <p class="text-gray-600">Total Materi</p>
        <h4 class="text-2xl font-bold text-gray-800">{{ $totalMateri }}</h4>
      </div>
    </div>
  </div>
  
  <div class="bg-green-100 rounded-xl p-6 border-2 border-green-200/20">
    <div class="flex items-center gap-3">
      <i class="fa-solid fa-check-circle bg-green-50 p-3 rounded-lg text-green-500 text-xl"></i>
      <div>
        <p class="text-gray-600">Materi Selesai</p>
        <h4 class="text-2xl font-bold text-gray-800">{{ $completedMateri }} / {{ $totalMateri }}</h4>
      </div>
    </div>
  </div>
  
  <div class="bg-blue-100 rounded-xl p-6 border-2 border-blue-200/20">
    <div class="flex items-center gap-3">
      <i class="fa-solid fa-trophy bg-blue-50 p-3 rounded-lg text-blue-500 text-xl"></i>
      <div>
        <p class="text-gray-600">Progress Belajar</p>
        <h4 class="text-2xl font-bold text-gray-800">{{ round(($completedMateri / $totalMateri) * 100) }}%</h4>
      </div>
    </div>
  </div>
</section>


