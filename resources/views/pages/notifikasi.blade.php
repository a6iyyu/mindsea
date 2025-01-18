@component("layouts.main-layout", [
    "judul" => "Notifikasi",
    "deskripsi" => "Ada yang terlewat? Tenang saja, di sini pusatnya notifikasi dan pemberitahuan mindsea.",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 bg-white">
    @include("components.notifikasi.hero")
    @include("components.notifikasi.list")
</main>
@endcomponent