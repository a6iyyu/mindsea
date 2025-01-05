@component("layouts.main-layout", [
    "judul" => "Progress Belajar | mindsea",
    "deskripsi" => "Pantau perkembangan belajarmu",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 pt-28 pb-12 bg-white lg:ml-12 lg:pr-10 lg:pl-60">
    @include("components.progres-belajar.hero")
    @include("components.progres-belajar.chart")
</main>
@endcomponent