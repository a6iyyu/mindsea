@component("layouts.main-layout", ["judul" => "Materi | mindsea", "deskripsi" => "Materi pembelajaran mindsea", "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen bg-white p-8 px-10 py-28 md:pl-60">
    @include("components.dashboard.materi.hero")
    @include("components.dashboard.materi.list-materi")
</main>
@endcomponent