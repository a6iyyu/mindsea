<header class="bg-{{ $exercise->color }}-50 rounded-2xl border-4 border-{{ $exercise->color }}-200 p-8 shadow-lg">
    <a
        href="{{ route('latihan') }}"
        class="flex items-center gap-2 text-{{ $exercise->color }}-500 bg-{{ $exercise->color }}-100 rounded-xl w-fit px-4 py-3 hover:bg-{{ $exercise->color }}-200 transition-colors"
    >
        <i class="fa-solid fa-arrow-left"></i>
        <h5 class="hidden lg:inline">Kembali ke daftar latihan</h5>
    </a>
    <section class="mt-6 flex items-center gap-4">
        <i class="fa-solid {{ $exercise->icon }} hidden bg-{{ $exercise->color }}-100 p-4 rounded-xl text-{{ $exercise->color }}-500 text-3xl lg:inline"></i>
        <h1 class="text-3xl font-bold text-{{ $exercise->color }}-700">
            Latihan {{ $exercise->title }}
        </h1>
    </section>
</header>

<section class="mt-8 bg-white rounded-xl border-4 border-{{ $exercise->color }}-200 px-8 py-6 shadow-lg hover:shadow-xl transition-all">
    @foreach ($questions as $index => $question)
        <h2 class="text-xl font-bold text-gray-800 mb-4">
            Soal {{ $index + 1 }}
        </h2>
        <h5 class="text-lg text-gray-600">
            {{ $question->question }}
        </h5>
        <ol class="mt-6 space-y-4">
            @foreach ($question->options as $option => $text)
                <button
                    class="w-full text-left px-6 py-4 rounded-xl border-2 border-{{ $exercise->color }}-200 hover:bg-{{ $exercise->color }}-50 transition-colors"
                    onclick="checkAnswer('{{ $option }}', '{{ $question->correct_answer }}', this, '{{ $question->id }}')"
                >
                    <span class="font-medium">{{ $option }}.</span> {{ $text }}
                </button>
            @endforeach
        </ol>
        <br>
    @endforeach
</section>

<footer class="mt-8">
    <button
        onclick="submitExercise()"
        class="flex items-center gap-2 bg-{{ $exercise->color }}-500 text-white px-8 py-4 rounded-xl hover:bg-{{ $exercise->color }}-600 transition-colors focus:ring-4 focus:ring-{{ $exercise->color }}-200"
    >
        <span>Selesai</span>
        <i class="fa-solid fa-check"></i>
    </button>
</footer>

<script>
    let answers = {};
    const exerciseId = `{{ $exercise->id }}`;

    function checkAnswer(selected, correct, element, questionId) {
        answers[questionId] = selected;
        const buttons = element.parentElement.querySelectorAll('button');
        buttons.forEach(btn => {
            btn.disabled = true;
            if (btn === element) {
                if (selected === correct) {
                    btn.classList.add('bg-green-100', 'border-green-500');
                } else {
                    btn.classList.add('bg-red-100', 'border-red-500');
                }
            } else if (btn.textContent.startsWith(correct)) {
                btn.classList.add('bg-green-100', 'border-green-500');
            }
        });
    }

    function submitExercise() {
        fetch(`/latihan/${exerciseId}/complete`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ answers: answers })
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(`Nilai Anda: ${data.score}\nJawaban benar: ${data.correct_answer} dari ${data.total_question} soal`);
                    window.location.href = '/latihan-soal';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim jawaban');
            });
    }
</script>