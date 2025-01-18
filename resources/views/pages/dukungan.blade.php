@component("layouts.main-layout", [
    "judul" => "Dukungan",
    "deskripsi" => "Mari pecahkan kendala Anda dan mencari solusi di pusat bantuan mindsea.",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 bg-white">
    @include("components.dukungan.cari-bantuan")
    @include("components.dukungan.kategori-bantuan")
    @include("components.dukungan.hubungi-kami")
</main>
@endcomponent