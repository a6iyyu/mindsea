@component("layouts.main-layout", ["judul" => "Pengenalan {$materi->title} | mindsea", "deskripsi" => $materi->description, "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen bg-white p-8 px-10 py-28 md:pl-60">
    @include("pages.sidebar.menu.materi.show.section.pengenalan.components.content")
</main>
@endcomponent