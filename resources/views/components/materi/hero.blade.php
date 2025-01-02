<!-- Materi Pembelajaran -->
<section class="flex flex-col gap-4 lg:flex-row lg:items-center">
  <i class="fa-solid fa-book-open w-fit bg-[#fceede] p-4 rounded-xl text-[#f58a66] text-3xl" aria-hidden="true"></i>
  <div>
    <h2 class="text-xl font-bold text-gray-800 lg:text-4xl">Materi Pembelajaran 📚<h2>
    <h5 class="mt-2 text-xl text-gray-600">Pilih materi yang ingin kamu pelajari</h5>
  </div>
</section>

<!-- Pencarian -->
<form role="search" class="relative mt-8">
  <label for="search-materi"></label>
  <input
    type="search"
    id="search-materi"
    name="search-materi"
    placeholder="Cari..."
    class="w-full px-6 py-4 text-lg bg-[#fceede]/30 border-3 border-[#f58a66]/20 rounded-xl shadow-sm focus:outline-none focus:border-[#f58a66] focus:ring-4 focus:ring-[#f58a66]/20 transition-colors placeholder-gray-500"
  />
  <button
    type="submit"
    class="fa-solid fa-search text-2xl text-[#f58a66] absolute right-3 top-8 -translate-y-1/2 p-2 hover:bg-[#f58a66]/10 rounded-lg transition-colors"
    aria-hidden="true"
    aria-label="Cari materi"
  ></button>
</form>

<!-- Filter -->
<nav class="my-8 flex flex-wrap gap-4">
  @php
    $filters = [
      [
        "icon" => "fa-solid fa-calculator",
        "lesson" => "Matematika"
      ],
      [
        "icon" => "fa-solid fa-book",
        "lesson" => "Bahasa Indonesia"
      ],
      [
        "icon" => "fa-solid fa-flask",
        "lesson" => "Sains"
      ],
      [
        "icon" => "fa-solid fa-ellipsis",
        "lesson" => "Lainnya"
      ]
    ]
  @endphp
  @foreach ($filters as $filter)
    <button class="flex items-center px-6 py-3 bg-[#fceede] text-[#f58a66] rounded-lg hover:bg-[#f58a66]/10 transition-colors">
      <i class="{{ $filter['icon'] }} mr-4" aria-hidden="true"></i>
      <span>{{ $filter['lesson'] }}</span>
    </button>
  @endforeach
</nav>