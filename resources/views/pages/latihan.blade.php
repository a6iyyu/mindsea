@component("layouts.main-layout", [
    "judul" => "Latihan Soal",
    "deskripsi" => "Asah kemampuan Anda dengan mengerjakan latihan soal dan jadikan dirimu yang terbaik!",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 bg-white">
    @include("components.latihan.header")
    @include("components.latihan.stats")
    @include("components.latihan.tips-hari-ini")
    @include("components.latihan.list-soal")
</main>
@endcomponent