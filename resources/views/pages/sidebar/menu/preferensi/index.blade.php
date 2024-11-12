@component("layouts.main-layout", ["judul" => "Preferensi | mindsea", "deskripsi" => "Pengaturan preferensi pembelajaran", "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen bg-white p-8 px-10 py-28 md:pl-60">
    @include("pages.sidebar.menu.preferensi.components.hero")
    @include("pages.sidebar.menu.preferensi.components.settings")
</main>
@endcomponent
