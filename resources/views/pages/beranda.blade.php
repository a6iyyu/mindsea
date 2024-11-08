@component("layouts.main-layout", ["judul" => "Beranda | mindsea", "deskripsi" => "Selamat datang di mindsea, platform pembelajaran yang menyediakan berbagai materi informatif untuk Anak Berkebutuhan Khusus.", "halaman_khusus" => false])
    <main class="lg:ml-68 ml-16 min-h-screen bg-white p-8 px-10 py-28 md:pl-60">
        @include("components.home.selamat-datang")
        @include("components.home.akses-belajar")
        @include("components.home.statistik")
    </main>
@endcomponent