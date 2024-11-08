@component("layouts.main-layout", ["judul" => "Latihan Soal | mindsea", "deskripsi" => "", "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen bg-white p-8 px-10 py-28 md:pl-60">
    @include("components.dashboard.latihan-soal.hero")
    @include("components.dashboard.latihan-soal.list-soal")
</main>
@endcomponent