@component("layouts.main-layout", [
    "judul" => "Progres Belajar",
    "deskripsi" => "Pantau perkembangan belajarmu",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 bg-white">
    @include("components.progres-belajar.hero")
    @include("components.progres-belajar.chart")
</main>
@endcomponent