@component("layouts.main-layout", ["judul" => "Tentang Kami | mindsea", "deskripsi" => "", "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen bg-white p-8 px-10 py-28 md:pl-60">
    <section class="mb-12">
        <h1 class="text-4xl font-bold text-gray-800">Tentang Kami 🎯</h1>
        <p class="mt-2 text-lg text-gray-600">Mengenal lebih dekat dengan mindsea dan visi misi kami</p>
    </section>
    @include('pages.tentang-kami.components.visi-misi')
    @include('pages.tentang-kami.components.anggota-tim')
    @include('pages.tentang-kami.components.hubungi-kami')
</main>
@endcomponent