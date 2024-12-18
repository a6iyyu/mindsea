@component("layouts.main-layout", ["judul" => "Dukungan | mindsea", "deskripsi" => "Pusat bantuan dan dukungan mindsea", "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen bg-white p-8 px-10 py-28 md:pl-60">
   @include("pages.dukungan.components.cari-bantuan")
   @include("pages.dukungan.components.kategori-bantuan")
   @include("pages.dukungan.components.hubungi-kami")
</main>
@endcomponent