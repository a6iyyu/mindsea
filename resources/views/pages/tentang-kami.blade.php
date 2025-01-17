@component("layouts.main-layout", [
    "judul" => "Tentang Kami",
    "deskripsi" => "Mari kenali lebih jauh tentang tim pengembang dibalik layar mindsea!",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 bg-white">
    <h1 class="text-xl font-bold text-gray-800 lg:text-4xl">Tentang Kami 🎯</h1>
    <p class="mt-2 mb-12 text-base text-gray-600 lg:text-lg">
        Mengenal lebih dekat dengan mindsea dan visi misi kami
    </p>
    @include('components.tentang-kami.visi-misi')
    @include('components.tentang-kami.anggota-tim')
    @include('components.tentang-kami.hubungi-kami')
</main>
@endcomponent