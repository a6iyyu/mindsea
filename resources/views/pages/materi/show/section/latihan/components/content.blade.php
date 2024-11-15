<div class="h-fit mt-8 p-6 border-4 bg-white border-purple-200 rounded-xl" role="article">

<h1 class="text-4xl font-bold text-purple-900 tracking-wide leading-relaxed" aria-level="1">
        {{ $exercise->title }}
    </h1>
    <div class="prose max-w-none mt-6 text-lg leading-loose text-gray-900"
        style="font-family: 'Open Sans', sans-serif;">
        {!! $exercise->content !!}
    </div>
    <div class="mt-6">
        <button onclick="speakText('{{ $exercise->audio_text }}')"
            class="bg-blue-100 p-4 rounded-xl hover:bg-blue-200 focus:ring-4 focus:ring-blue-300 transition-all"
            aria-label="Putar audio teks" title="Klik untuk mendengarkan teks">
            <i class="fa-solid fa-volume-high text-blue-600 text-xl"></i>
            <span class="sr-only">Putar audio</span>
        </button>
    </div>
</div>

<div class="mt-10 flex justify-between items-center">
    <a href="{{ route('materi.show.main', $materi->id) }}"
        class="text-blue-600 hover:text-blue-800 text-lg font-medium transition-colors focus:ring-4 focus:ring-blue-300 p-2 rounded"
        aria-label="Kembali ke materi utama">
        <i class="fa-solid fa-arrow-left mr-2"></i>
        <span>Kembali ke Materi Utama</span>
    </a>
    <button onclick="completeContent({{ $materi->id }})"
        class="bg-green-600 text-white px-8 py-4 text-lg font-medium rounded-xl hover:bg-green-700 transition-colors focus:ring-4 focus:ring-green-300"
        id="complete-btn">
        Selesai
        <i class="fa-solid fa-check ml-2"></i>
    </button>
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