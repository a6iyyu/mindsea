@component("layouts.main-layout", [
    "judul" => "Chatbot | mindsea",
    "deskripsi" => "Asisten pembelajaran pintar mindsea",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 pt-28 pb-16 bg-white lg:ml-12 lg:py-28 lg:pr-10 lg:pl-60">
    @include("components.chatbot.chat")
</main>
@endcomponent