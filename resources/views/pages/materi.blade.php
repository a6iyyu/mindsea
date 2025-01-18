@component("layouts.main-layout", [
    "judul" => "Materi",
    "deskripsi" => "Mari belajar dengan cara menyenangkan di mindsea!",
    "halaman_khusus" => false
])
    <main class="min-h-screen px-6 bg-white">
        @include("components.materi.hero")
        @include("components.materi.list-materi")
    </main>
@endcomponent