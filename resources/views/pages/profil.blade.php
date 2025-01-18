@component("layouts.main-layout", [
    "judul" => "Profil",
    "deskripsi" => "Atur profil Anda dan sesuaikan dengan deskripsi dirimu!",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 bg-white">
    @include("components.profil.hero")
    @include("components.profil.profil-pengguna")
    @include("layouts.forest-background")
</main>
@endcomponent