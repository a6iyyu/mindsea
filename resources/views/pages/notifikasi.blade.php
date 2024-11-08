@component("layouts.main-layout", ["judul" => "Notifikasi | mindsea", "deskripsi" => "Pusat notifikasi dan pemberitahuan mindsea", "halaman_khusus" => false])
<main class="lg:ml-68 ml-16 min-h-screen bg-white p-8 px-10 py-28 md:pl-60">
    @include("components.notification.hero")
    @include("components.notification.list")
</main>
@endcomponent 