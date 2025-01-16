@component("layouts.main-layout", [
    "judul" => "Permainan Penjumlahan Seru",
    "deskripsi" => "Belajar berhitung dengan cara yang menyenangkan",
    "halaman_khusus" => false
])
<main class="min-h-screen px-6 pt-28 pb-16 bg-white lg:ml-12 lg:py-28 lg:pr-10 lg:pl-60">
    <header class="mb-8">
        <div class="flex items-center gap-4">
            <i class="fa-solid fa-calculator bg-emerald-100 p-4 rounded-xl text-emerald-500 text-3xl"></i>
            <div>
                <h1 class="text-2xl font-bold text-gray-800 lg:text-4xl">Penjumlahan Seru 🎮</h1>
                <p class="mt-2 text-gray-600">Asah kemampuan berhitungmu dengan cara yang menyenangkan!</p>
            </div>
        </div>

        <button
            onclick="window.SpeakText('Mari bermain penjumlahan seru! Pilih jawaban yang benar dari soal penjumlahan yang diberikan. Kamu punya waktu 30 detik untuk setiap soal.')"
            class="mt-4 flex items-center gap-2 px-4 py-2 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">
            <i class="fas fa-volume-up"></i>
            <span>Dengarkan Petunjuk</span>
        </button>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-emerald-50 rounded-xl p-6 border-2 border-emerald-200">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-star bg-emerald-100 p-3 rounded-lg text-emerald-500 text-xl"></i>
                <div>
                    <p class="text-emerald-600">Skor</p>
                    <h4 class="text-2xl font-bold text-emerald-700" id="score">0</h4>
                </div>
            </div>
        </div>

        <div class="bg-blue-50 rounded-xl p-6 border-2 border-blue-200">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-clock bg-blue-100 p-3 rounded-lg text-blue-500 text-xl"></i>
                <div>
                    <p class="text-blue-600">Waktu</p>
                    <h4 class="text-2xl font-bold text-blue-700" id="timer">120</h4>
                </div>
            </div>
        </div>

        <div class="bg-purple-50 rounded-xl p-6 border-2 border-purple-200">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-trophy bg-purple-100 p-3 rounded-lg text-purple-500 text-xl"></i>
                <div>
                    <p class="text-purple-600">Level</p>
                    <h4 class="text-2xl font-bold text-purple-700" id="level">1</h4>
                </div>
            </div>
        </div>
    </div>

    <div class=" bg-white rounded-2xl border-4 border-emerald-200 p-8 shadow-lg">
        <div class="hidden text-center mb-8" id="question-container">
            <h2 class="text-4xl font-bold text-gray-800 mb-4" id="question">8 + 5 = ?</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4" id="options">
                <button
                    class="option-btn p-4 text-xl font-bold rounded-xl border-2 border-emerald-200 hover:bg-emerald-50 transition-colors">
                    12
                </button>
                <button
                    class="option-btn p-4 text-xl font-bold rounded-xl border-2 border-emerald-200 hover:bg-emerald-50 transition-colors">
                    13
                </button>
                <button
                    class="option-btn p-4 text-xl font-bold rounded-xl border-2 border-emerald-200 hover:bg-emerald-50 transition-colors">
                    14
                </button>
                <button
                    class="option-btn p-4 text-xl font-bold rounded-xl border-2 border-emerald-200 hover:bg-emerald-50 transition-colors">
                    15
                </button>
            </div>
        </div>

        <div class="text-center mb-8" id="instructions">
            <div
                class="bg-gradient-to-r from-emerald-50 to-blue-50 p-6 rounded-xl border-2 border-emerald-200 shadow-sm">
                <p class="text-gray-700 text-lg">
                    <i class="fas fa-gamepad text-emerald-500 mr-2"></i>
                    Klik tombol <span class="font-bold text-emerald-600">Mulai Bermain</span> untuk memulai petualangan
                    matematika!
                </p>
                <p class="text-sm text-gray-500 mt-2">
                    Jawab pertanyaan secepat mungkin untuk mendapatkan skor tertinggi
                </p>
            </div>
        </div>

        <div class="flex justify-center gap-4">
            <button onclick="toggleGame()"
                class="px-6 py-3 bg-emerald-500 text-white rounded-xl hover:bg-emerald-600 transition-colors"
                id="start-btn">
                Mulai Bermain
            </button>
            <a href="{{ route('permainan') }}"
                class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-colors">
                Kembali
            </a>
        </div>
    </div>
</main>

<script>
    let score = 0;
    let level = 1;
    let timer = 120;
    let gameInterval;
    let currentAnswer;
    let isGameRunning = false;

    function generateQuestion() {
        const max = level * 10;
        const num1 = Math.floor(Math.random() * max) + 1;
        const num2 = Math.floor(Math.random() * max) + 1;
        currentAnswer = num1 + num2;

        const questionText = `${num1} ditambah ${num2} sama dengan berapa?`;
        document.getElementById('question').textContent = `${num1} + ${num2} = ?`;

        // Disable all option buttons before speaking
        toggleOptionButtons(false);
        
        // Speak text and enable buttons after speaking is done
        window.SpeakText(questionText, {
            onEnd: () => toggleOptionButtons(true)
        });

        const options = [currentAnswer];
        while (options.length < 4) {
            const wrongAnswer = currentAnswer + Math.floor(Math.random() * 5) * (Math.random() < 0.5 ? -1 : 1);
            if (!options.includes(wrongAnswer) && wrongAnswer > 0) {
                options.push(wrongAnswer);
            }
        }

        options.sort(() => Math.random() - 0.5);

        const optionBtns = document.querySelectorAll('.option-btn');
        optionBtns.forEach((btn, index) => {
            btn.textContent = options[index];
            btn.onclick = () => checkAnswer(options[index], btn);
        });
    }

    function toggleOptionButtons(enabled) {
        const optionBtns = document.querySelectorAll('.option-btn');
        optionBtns.forEach(btn => {
            btn.disabled = !enabled;
            if (!enabled) {
                btn.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                btn.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        });
    }

    function checkAnswer(selected, btn) {
        toggleOptionButtons(false);

        const optionBtns = document.querySelectorAll('.option-btn');
        optionBtns.forEach((button) => {
            button.classList.remove('bg-green-100', 'border-green-500', 'bg-red-100', 'border-red-500');
        });

        if (selected === currentAnswer) {
            score += 10 * level;
            document.getElementById('score').textContent = score;

            btn.classList.add('bg-green-100', 'border-green-500');

            if (score >= level * 50) {
                level++;
                document.getElementById('level').textContent = level;
                window.SpeakText('Selamat! Kamu naik level!');
            }

            window.SpeakText('Benar!', {
                onEnd: () => {
                    btn.classList.remove('bg-green-100', 'border-green-500');
                    generateQuestion();
                }
            });
        } else {
            btn.classList.add('bg-red-100', 'border-red-500');
            window.SpeakText('Coba lagi!', {
                onEnd: () => toggleOptionButtons(true)
            });
        }
    }

    function toggleGame() {
        const startBtn = document.getElementById('start-btn');

        if (!isGameRunning) {
            startGame();
            document.getElementById('question-container').classList.remove('hidden');
            document.getElementById('instructions').classList.add('hidden');
            startBtn.textContent = 'Stop';
            startBtn.classList.remove('bg-emerald-500', 'hover:bg-emerald-600');
            startBtn.classList.add('bg-red-500', 'hover:bg-red-600');
            isGameRunning = true;
        } else {
            clearInterval(gameInterval);
            document.getElementById('question-container').classList.add('hidden');
            document.getElementById('instructions').classList.remove('hidden');
            window.SpeakText(`Permainan Dihentikan! Skor kamu ${score}`);
            startBtn.textContent = 'Mulai Bermain';
            startBtn.classList.remove('bg-red-500', 'hover:bg-red-600');
            startBtn.classList.add('bg-emerald-500', 'hover:bg-emerald-600');
            startBtn.disabled = false;
            isGameRunning = false;
        }
    }

    function startGame() {
        score = 0;
        level = 1;
        timer = 120;

        document.getElementById('score').textContent = score;
        document.getElementById('level').textContent = level;
        document.getElementById('timer').textContent = timer;

        generateQuestion();

        gameInterval = setInterval(() => {
            timer--;
            document.getElementById('timer').textContent = timer;

            if (timer <= 0) {
                toggleGame();
            }
        }, 1000);
    }
</script>
@endcomponent