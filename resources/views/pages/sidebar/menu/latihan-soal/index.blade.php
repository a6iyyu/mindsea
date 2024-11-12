@component("layouts.main-layout", ["judul" => "Latihan Soal | mindsea", "deskripsi" => "", "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen bg-white p-8 px-10 py-28 md:pl-60">
    @include("pages.sidebar.menu.latihan-soal.components.hero")
    @include("pages.sidebar.menu.latihan-soal.components.list-soal")
</main>
@endcomponent