@component("layouts.main-layout", ["judul" => "Masuk | mindsea", "deskripsi" => "", "halaman_khusus" => true, "auth" => false])
<main class="flex flex-col justify-center items-center min-h-screen px-4 overflow-y-hidden">
    <a href="/" class="absolute top-8 left-8 text-gray-600 hover:text-[#f58a66] transition-colors">
        <i class="fa-solid fa-arrow-left text-2xl"></i>
    </a>

    @include("pages.auth.login.components.form")
</main>
@endcomponent