@component("layouts.main-layout", [
    "judul" => "Beranda | mindsea", 
    "deskripsi" => "Selamat datang di mindsea, platform pembelajaran yang menyediakan berbagai materi informatif untuk Anak Berkebutuhan Khusus.", 
    "halaman_khusus" => false
])
    <main class="ml-16 min-h-screen px-6 pt-28 pb-16 bg-white lg:ml-68 lg:py-28 lg:pr-10 lg:pl-60">
        @include("components.dashboard.selamat-datang")
        @include("components.dashboard.menu-utama") 
        @include("components.dashboard.statistik")
    </main>
@endcomponent