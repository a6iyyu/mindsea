@component("layouts.main-layout", [
    "judul" => "Latihan {$exercise->title}",
    "deskripsi" => $exercise->description,
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 bg-white">
    @include("components.latihan.content")
</main>
@endcomponent