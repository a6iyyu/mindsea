@component("layouts.main-layout", [
    "judul" => "Profil",
    "deskripsi" => "Atur profil Anda dan sesuaikan dengan deskripsi dirimu!",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 pt-28 pb-12 bg-white lg:ml-12 lg:pr-10 lg:pl-60">
    @include("components.profil.hero")
    @include("components.profil.profil-pengguna")
    @include("layouts.forest-background")
</main>
@endcomponent