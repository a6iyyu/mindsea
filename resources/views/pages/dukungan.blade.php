@component("layouts.main-layout", [
    "judul" => "Dukungan | mindsea",
    "deskripsi" => "Pusat bantuan dan dukungan mindsea",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 pt-28 pb-16 bg-white lg:ml-12 lg:py-28 lg:pr-10 lg:pl-60">
    @include("components.dukungan.cari-bantuan")
    @include("components.dukungan.kategori-bantuan")
    @include("components.dukungan.hubungi-kami")
</main>
@endcomponent