@component("layouts.main-layout", ["judul" => "Latihan Soal | mindsea", "deskripsi" => "", "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen bg-white p-8 px-10 py-28 md:pl-60 z-0 relative">
    @include("pages.latihan.components.hero")
    @include("pages.latihan.components.list-soal")
</main>
@endcomponent