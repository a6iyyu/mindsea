<div class="space-y-8">
    <header class="bg-{{ $exercise->color }}-50 rounded-2xl border-4 border-{{ $exercise->color }}-200 p-8 shadow-lg">
        <nav class="mb-6">
            <a href="{{ route('latihan.index') }}"
                class="flex items-center gap-2 text-{{ $exercise->color }}-500 bg-{{ $exercise->color }}-100 rounded-xl w-fit px-4 py-3 hover:bg-{{ $exercise->color }}-200 transition-colors">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Kembali ke daftar latihan</span>
            </a>
        </nav>

        <div class="flex items-center gap-4">
            <span class="bg-{{ $exercise->color }}-100 p-4 rounded-xl">
                <i class="fa-solid {{ $exercise->icon }} text-{{ $exercise->color }}-500 text-3xl"></i>
            </span>
            <h1 class="text-3xl font-bold text-{{ $exercise->color }}-700">
                Latihan {{ $exercise->title }}
            </h1>
        </div>
    </header>

    <section class="grid grid-cols-1 gap-6">
        @foreach($questions as $index => $question)
            <article
                class="bg-white rounded-xl border-4 border-{{ $exercise->color }}-200 p-6 shadow-lg hover:shadow-xl transition-all">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Soal {{ $index + 1 }}</h2>
                <div class="prose max-w-none">
                    <p class="text-lg text-gray-600">
                        {{ $question->question }}
                    </p>
                </div>
                <div class="mt-6 space-y-4">
                    @foreach ($question->options as $option => $text)
                        <button
                            class="w-full text-left px-6 py-4 rounded-xl border-2 border-{{ $exercise->color }}-200 hover:bg-{{ $exercise->color }}-50 transition-colors"
                            onclick="checkAnswer('{{ $option }}', '{{ $question->correct_answer }}', this, {{ $question->id }})">
                            <span class="font-medium">{{ $option }}.</span> {{ $text }}
                        </button>
                    @endforeach
                </div>
            </article>
        @endforeach
    </section>

    <footer class="flex justify-between items-center">
        {{ $questions->links() }}
        <button
            onclick="submitExercise()"
            class="flex items-center gap-2 bg-{{ $exercise->color }}-500 text-white px-8 py-4 rounded-xl hover:bg-{{ $exercise->color }}-600 transition-colors focus:ring-4 focus:ring-{{ $exercise->color }}-200">
            <span>Selesai</span>
            <i class="fa-solid fa-check"></i>
        </button>
    </footer>
</div>

<script>
    let answers = {};
    const exerciseId = {{ $exercise->id }};

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