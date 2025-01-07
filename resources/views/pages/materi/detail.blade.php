@component('layouts.main-layout', [
    "judul" => "{$materi['title']}",
    "deskripsi" => $materi['description'],
    "halaman_khusus" => false
]);
<main class="lg:ml-68 p-8 py-28 md:pl-60 relative z-10 ml-16 min-h-screen bg-white px-6 pt-28 pb-16 lg:ml-68 lg:pr-10 lg:pl-60 lg:py-28">
    @include('components.materi.header')
    @include('components.materi.content')
</main>
@endcomponent