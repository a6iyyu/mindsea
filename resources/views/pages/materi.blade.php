@component("layouts.main-layout", [
    "judul" => "Materi",
    "deskripsi" => "Mari belajar dengan cara menyenangkan di mindsea!",
    "halaman_khusus" => false
])
    <main class="min-h-screen px-6 pt-28 pb-12 bg-white lg:ml-12 lg:pr-10 lg:pl-60">
        @include("components.materi.hero")
        @include("components.materi.list-materi")
    </main>
@endcomponent