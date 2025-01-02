@component("layouts.main-layout", ["judul" => "Tentang Kami | mindsea", "deskripsi" => "", "halaman_khusus" => false])
<main class="ml-16 min-h-screen px-6 pt-28 pb-16 bg-white lg:ml-68 lg:py-28 lg:pr-10 lg:pl-60">
  <h1 class="text-xl font-bold text-gray-800 lg:text-4xl">Tentang Kami 🎯</h1>
  <p class="mt-2 mb-12 text-base text-gray-600 lg:text-lg">Mengenal lebih dekat dengan mindsea dan visi misi kami</p>
  @include('components.tentang-kami.visi-misi')
  @include('components.tentang-kami.anggota-tim')
  @include('components.tentang-kami.hubungi-kami')
</main>
@endcomponent