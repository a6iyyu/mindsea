@component("layouts.main-layout", ["judul" => "Latihan {$exercise->title} | mindsea", "deskripsi" => $exercise->description, "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen p-8 px-10 py-28 md:pl-60 relative z-10">
    @include("pages.latihan.section.components.content")
</main>
@endcomponent