@component("layouts.main-layout", [
    "judul" => "{$content['title']}",
    "deskripsi" => "Bantuan seputar {$content['title']}",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 bg-white">
    <a href="{{ route('support') }}"  class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800 mb-8">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali ke Pusat Bantuan</span>
    </a>

    <!-- Category Header -->
    <header class="mb-8">
        <div class="flex items-center gap-4 mb-4">
            <span class="bg-{{ $content['color'] }}-100 p-4 rounded-xl">
                <i class="fas {{ $content['icon'] }} text-{{ $content['color'] }}-500 text-2xl"></i>
            </span>
            <h1 class="text-3xl font-bold text-gray-800">{{ $content['title'] }}</h1>
        </div>
        <p class="text-gray-600">Temukan bantuan seputar {{ strtolower($content['title']) }} di sini</p>
    </header>

    <!-- Help Sections -->
    <section class="space-y-6">
        @foreach($content['sections'] as $section)
            <article class="bg-white p-6 rounded-xl border-4 border-{{ $content['color'] }}-200/20 shadow-md">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ $section['title'] }}</h2>
                <p class="text-gray-600">{{ $section['content'] }}</p>
            </article>
        @endforeach
    </section>
</main>
@endcomponent