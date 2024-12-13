@component("layouts.main-layout", ["judul" => "Profil | mindsea", "deskripsi" => "Pengaturan profil mindsea", "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen bg-white p-8 px-10 py-28 md:pl-60">
    @include("pages.profil.components.hero")
    @include("pages.profil.components.profile-settings")
    @include("layouts.forest-background")
</main>
@endcomponent