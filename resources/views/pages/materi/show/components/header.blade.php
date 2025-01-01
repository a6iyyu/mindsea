<figure
  class="mb-6 bg-purple-50 rounded-2xl border-4 border-purple-200 p-6 shadow-lg hover:shadow-xl transition-shadow">
  <a href="{{ route('materi.index') }}"
    class="flex items-center gap-2 text-purple-500 bg-purple-100 rounded-xl w-fit px-4 py-3 hover:bg-purple-200 transition-colors">
    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
    <h5 class="ml-1 hidden lg:inline">Kembali ke daftar materi</h5>
  </a>
  <section class="mt-6 grid grid-cols-1 gap-6 lg:grid lg:grid-cols-4">
    <header class="flex flex-col items-start justify-center gap-4 mb-6 col-span-3 lg:items-center">
      <div class="w-full flex items-center gap-4">
        <i class="fa-solid fa-book-open hidden bg-purple-100 p-4 rounded-xl text-purple-500 text-2xl lg:inline"></i>
        <h1 class="text-xl font-bold text-purple-700 lg:text-3xl">
          {{ $materi->title }}
        </h1>
      </div>
      <h5 class="w-full text-xl text-purple-600 rounded-xl lg:p-6 lg:bg-white">
        {{ $materi->description }}
      </h5>
    </header>
    <img src="{{ asset('images/cute-mascot.png') }}" alt="Maskot Menggemaskan"
      class="w-full object-cover rounded-xl border-4 border-purple-200 shadow-md -order-1 lg:order-1">
  </section>
</figure>