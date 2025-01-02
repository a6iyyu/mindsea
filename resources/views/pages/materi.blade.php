@component("layouts.main-layout", [
    "judul" => "Materi | mindsea",
    "deskripsi" => "Materi pembelajaran mindsea",
    "halaman_khusus" => false
])
    <main class="ml-16 min-h-screen px-6 pt-28 pb-16 bg-white lg:ml-68 lg:py-28 lg:pr-10 lg:pl-60">
        @include("components.materi.hero")
        @include("components.materi.list-materi")
    </main>
@endcomponent