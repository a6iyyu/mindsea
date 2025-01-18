@component('layouts.main-layout', [
    "judul" => "{$materi['title']}",
    "deskripsi" => $materi['description'],
    "halaman_khusus" => false
]);
<main class="min-h-screen px-6 bg-white">
    @include('components.materi.header')
    @include('components.materi.content')
</main>
@endcomponent