@component("layouts.main-layout", [
    "judul" => "Chatbot | mindsea",
    "deskripsi" => "Asisten pembelajaran pintar mindsea",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 bg-white">
    @include("components.chatbot.chat")
</main>
@endcomponent