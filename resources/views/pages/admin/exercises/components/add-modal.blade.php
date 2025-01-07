@component('pages.admin.materials.components.modal', ['id' => 'addExerciseModal', 'title' => 'Tambah Latihan'])
    <form action="{{ route('admin.exercises.store') }}" method="POST" id="addExerciseForm">
        @csrf
        <div class="space-y-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm text-gray-600">Judul</label>
                    <input type="text" name="title" required
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                </div>
                <div>
                    <label class="block text-sm text-gray-600">Deskripsi</label>
                    <textarea name="description" rows="2" required
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600">Ikon</label>
                        <input type="text" name="icon" required placeholder="fa-calculator"
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Warna</label>
                        <select name="color" required
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                            <option value="blue">Biru</option>
                            <option value="green">Hijau</option>
                            <option value="yellow">Kuning</option>
                            <option value="red">Merah</option>
                            <option value="purple">Ungu</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <h5 class="font-medium text-gray-600">Daftar Soal</h5>
                    <button type="button" onclick="addQuestion()"
                        class="rounded-xl bg-blue-100 px-4 py-2 text-blue-600 hover:bg-blue-200">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Soal
                    </button>
                </div>
                <div id="questions-container" class="space-y-6">
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-4">
            <button type="button" onclick="closeModal('addExerciseModal')"
                class="rounded-xl bg-gray-100 px-6 py-3 text-gray-700 hover:bg-gray-200">
                Batal
            </button>
            <button type="submit"
                class="rounded-xl bg-blue-500 px-6 py-3 text-white hover:bg-blue-600">
                Simpan
            </button>
        </div>
    </form>
</main>

<script>
let questionCount = 0;

function addQuestion() {
    questionCount++;
    const container = document.getElementById('questions-container');
    const questionDiv = document.createElement('div');
    questionDiv.className = 'p-4 border-2 border-gray-200 rounded-xl space-y-4';
    questionDiv.innerHTML = `
        <div class="flex items-center justify-between">
            <h6 class="font-medium">Soal ${questionCount}</h6>
            <button type="button" onclick="this.closest('.p-4').remove()"
                class="text-red-500 hover:text-red-600">
                <i class="fas fa-trash"></i>
            </button>
        </div>
        <div>
            <label class="block text-sm text-gray-600">Pertanyaan</label>
            <textarea name="questions[${questionCount-1}][question]" required rows="2"
                class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm text-gray-600">Opsi A</label>
                <input type="text" name="questions[${questionCount-1}][options][A]" required
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
            </div>
            <div>
                <label class="block text-sm text-gray-600">Opsi B</label>
                <input type="text" name="questions[${questionCount-1}][options][B]" required
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
            </div>
            <div>
                <label class="block text-sm text-gray-600">Opsi C</label>
                <input type="text" name="questions[${questionCount-1}][options][C]" required
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
            </div>
            <div>
                <label class="block text-sm text-gray-600">Opsi D</label>
                <input type="text" name="questions[${questionCount-1}][options][D]" required
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
            </div>
        </div>
        <div>
            <label class="block text-sm text-gray-600">Jawaban Benar</label>
            <select name="questions[${questionCount-1}][correct_answer]" required
                class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>
    `;
    container.appendChild(questionDiv);
}

document.querySelector('[onclick="openModal(\'addExerciseModal\')"]')?.addEventListener('click', () => {
    const container = document.getElementById('questions-container');
    if (container && container.children.length === 0) {
        addQuestion();
    }
});
</script>
@endcomponent 