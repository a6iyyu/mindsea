@component("layouts.main-layout", [
    "judul" => "Latihan Soal",
    "deskripsi" => "Asah kemampuan Anda dengan mengerjakan latihan soal dan jadikan dirimu yang terbaik!",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 pt-28 pb-12 bg-white lg:ml-12 lg:pr-10 lg:pl-60 z-0 relative">
    @include("components.latihan.header")
    @include("components.latihan.stats")
    @include("components.latihan.tips-hari-ini")
    @include("components.latihan.list-soal")
</main>
@endcomponent