<div class="space-y-8">
    <!-- Konten Latihan -->
    <div class="bg-orange-50 rounded-2xl border-4 border-orange-200 p-8 shadow-lg hover:shadow-xl transition-shadow"
        role="article">
        <header class="flex items-center gap-4 mb-8">
            <span class="bg-orange-100 p-4 rounded-xl">
                <i class="fa-solid fa-pencil text-orange-500 text-3xl"></i>
            </span>
            <h1 class="text-3xl font-bold text-orange-700">
                {{ $exercise->title }}
            </h1>
            <button onclick="speakText('{{ $exercise->audio_text }}')"
                class="p-4 bg-orange-100 rounded-xl hover:bg-orange-200 transition-colors" aria-label="Putar audio teks"
                title="Klik untuk mendengarkan teks">
                <i class="fa-solid fa-volume-high text-orange-500 text-2xl"></i>
            </button>
        </header>

        <div class="prose max-w-none bg-white p-6 rounded-xl">
            <div class="text-xl leading-relaxed text-gray-700">
                {!! $exercise->content !!}
            </div>
        </div>
    </div>

    <!-- Navigasi -->
    <div class="flex justify-between items-center">
        <a href="{{ route('materi.show.main', $materi->id) }}"
            class="flex items-center gap-2 text-orange-500 bg-orange-100 rounded-xl px-6 py-4 hover:bg-orange-200 transition-colors"
            aria-label="Kembali ke materi utama">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Materi Utama</span>
        </a>
        <nav class="flex items-center gap-4">
            <a href="/"
                class="flex items-center justify-center bg-[#f58a66] text-white w-14 h-14 text-lg font-medium rounded-xl hover:bg-[#f47951] transition-colors focus:ring-4 focus:ring-[#fceede]"
                aria-label="Kembali ke beranda">
                <i class="fa-solid fa-home text-2xl"></i>
            </a>
            <button onclick="completeContent({{ $materi->id }})"
                class="flex items-center gap-2 bg-green-600 text-white px-8 py-4 text-lg font-medium rounded-xl hover:bg-green-700 transition-colors focus:ring-4 focus:ring-green-300"
                id="complete-btn">
                <span>Selesai</span>
                <i class="fa-solid fa-check"></i>
            </button>
        </nav>

    </div>
</div>

<script>
    function completeContent(materialId) {
        const btn = document.getElementById('complete-btn');
        btn.disabled = true;
        btn.innerHTML = 'Memproses... <i class="fa-solid fa-spinner fa-spin ml-2"></i>';

        fetch(`/materi/${materialId}/complete`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    btn.classList.add('bg-gray-500');
                    btn.classList.remove('hover:bg-green-700');
                    btn.innerHTML = 'Sudah Selesai <i class="fa-solid fa-check ml-2"></i>';
                    alert(data.message);
                    window.location.reload();
                } else {
                    btn.disabled = false;
                    btn.innerHTML = 'Selesai <i class="fa-solid fa-check ml-2"></i>';
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                btn.disabled = false;
                btn.innerHTML = 'Selesai <i class="fa-solid fa-check ml-2"></i>';
                alert('Terjadi kesalahan saat menyelesaikan materi');
            });
    }

    document.addEventListener('DOMContentLoaded', function () {
        fetch(`/materi/${materialId}/status`)
            .then(response => response.json())
            .then(data => {
                if (data.is_completed) {
                    const btn = document.getElementById('complete-btn');
                    btn.classList.add('bg-gray-500');
                    btn.classList.remove('hover:bg-green-700');
                    btn.disabled = true;
                    btn.innerHTML = 'Sudah Selesai <i class="fa-solid fa-check ml-2"></i>';
                }
            });
    });
</script>