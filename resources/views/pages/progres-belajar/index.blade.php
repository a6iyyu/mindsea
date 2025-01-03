@component("layouts.main-layout", ["judul" => "Progress Belajar | mindsea", "deskripsi" => "Pantau perkembangan belajarmu", "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen bg-white p-8 px-10 py-28 md:pl-60">
    @include("pages.progres-belajar.components.hero")
    @include("pages.progres-belajar.components.chart")
</main>
@endcomponent