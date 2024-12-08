@component("layouts.main-layout", ["judul" => "Latihan Soal {$materi->title} | mindsea", "deskripsi" => $materi->description, "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen p-8 px-10 py-28 md:pl-60 relative z-10">
    @include("pages.materi.show.section.latihan.components.content")
</main>
@endcomponent