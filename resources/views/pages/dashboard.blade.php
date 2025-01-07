@component("layouts.main-layout", [
    "judul" => "Beranda", 
    "deskripsi" => "Selamat datang di mindsea, platform pembelajaran yang menyediakan berbagai materi informatif untuk Anak Berkebutuhan Khusus.", 
    "halaman_khusus" => false
])
    <main class="min-h-screen px-6 pt-28 pb-12 bg-white lg:ml-12 lg:pr-10 lg:pl-60">
        @include("components.dashboard.selamat-datang")
        @include("components.dashboard.menu-utama") 
        @include("components.dashboard.statistik")
    </main>
@endcomponent