<section class="mb-12">
  <header class="flex items-center gap-4 mb-6">
    <span class="bg-[#fceede] p-4 rounded-xl">
      <i class="fa-solid fa-book-open text-[#f58a66] text-3xl" aria-hidden="true"></i>
    </span>
    <div>
      <h1 class="text-4xl font-bold text-gray-800">
        Materi Pembelajaran 📚
      </h1>
      <p class="mt-2 text-xl text-gray-600">
        Pilih materi yang ingin kamu pelajari
      </p>
    </div>
  </header>

  <div class="relative mt-8">
    <form role="search">
      <label for="search-materi" class="sr-only">Cari materi pembelajaran</label>
      <input type="search" id="search-materi" name="search-materi" placeholder="Cari materi yang ingin kamu pelajari..."
        class="w-full px-6 py-4 text-lg bg-[#fceede]/30 border-3 border-[#f58a66]/20 rounded-xl shadow-sm focus:outline-none focus:border-[#f58a66] focus:ring-4 focus:ring-[#f58a66]/20 transition-colors placeholder-gray-500" aria-label="Kotak pencarian materi pembelajaran">

      <button type="submit"
        class="absolute right-3 top-8 -translate-y-1/2 p-2 hover:bg-[#f58a66]/10 rounded-lg transition-colors"
        aria-label="Tombol cari materi">
        <i class="fa-solid fa-search text-2xl text-[#f58a66]" aria-hidden="true"></i>
      </button>
    </form>

    <nav class="mt-4">
      <ul class="flex flex-wrap gap-4">
        <li>
          <button
            class="px-4 py-2 text-xl bg-[#fceede] text-[#f58a66] rounded-lg hover:bg-[#f58a66]/10 transition-colors">
            <i class="fa-solid fa-calculator mr-2" aria-hidden="true"></i>Matematika
          </button>
        </li>
        <li>
          <button
            class="px-4 py-2 text-xl bg-[#fceede] text-[#f58a66] rounded-lg hover:bg-[#f58a66]/10 transition-colors">
            <i class="fa-solid fa-book mr-2" aria-hidden="true"></i>Bahasa
          </button>
        </li>
        <li>
          <button
            class="px-4 py-2 text-xl bg-[#fceede] text-[#f58a66] rounded-lg hover:bg-[#f58a66]/10 transition-colors">
            <i class="fa-solid fa-flask mr-2" aria-hidden="true"></i>Sains
          </button>
        </li>
        <li>
          <button
            class="px-4 py-2 text-xl bg-[#fceede] text-[#f58a66] rounded-lg hover:bg-[#f58a66]/10 transition-colors">
            <i class="fa-solid fa-ellipsis mr-2" aria-hidden="true"></i>Lainnya
          </button>
        </li>
      </ul>
    </nav>
  </div>
</section>