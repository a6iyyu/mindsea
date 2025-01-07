@component("layouts.main-layout", [
    "judul" => "Latihan {$exercise->title}",
    "deskripsi" => $exercise->description,
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 pt-28 pb-12 bg-white lg:ml-12 lg:pr-10 lg:pl-60  relative z-10">
    @include("components.latihan.content")
</main>
@endcomponent