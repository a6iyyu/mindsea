@component('components.admin.materials.modal', ['id' => 'edit_exercise_modal', 'title' => 'Edit Latihan'])
    <form id="edit_exercise_form" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm text-gray-600">Judul</label>
                    <input type="text" name="title" id="edit_title" required
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                </div>
                <div>
                    <label class="block text-sm text-gray-600">Deskripsi</label>
                    <textarea name="description" id="edit_description" rows="2" required
                        class="mt-1 block resize-none w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600">Ikon</label>
                        <input type="text" name="icon" id="edit_icon" required placeholder="fa-calculator"
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Warna</label>
                        <select name="color" id="edit_color" required
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                            <option value="blue">Biru</option>
                            <option value="green">Hijau</option>
                            <option value="yellow">Kuning</option>
                            <option value="red">Merah</option>
                            <option value="purple">Ungu</option>
                            <option value="orange">Orange</option>
                            <option value="pink">Pink</option>
                            <option value="gray">Abu-abu</option>
                            <option value="indigo">Indigo</option>
                            <option value="teal">Teal</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <h5 class="font-medium text-gray-600">Daftar Soal</h5>
                    <button type="button" onclick="addEditQuestion()"
                        class="rounded-xl bg-blue-100 px-4 py-2 text-blue-600 hover:bg-blue-200">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Soal
                    </button>
                </div>
                <div id="edit-questions-container" class="space-y-6">
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-4">
            <button type="button" onclick="close_modal('edit_exercise_modal')"
                class="rounded-xl bg-gray-100 px-6 py-3 text-gray-700 hover:bg-gray-200">
                Batal
            </button>
            <button type="submit"
                class="rounded-xl bg-blue-500 px-6 py-3 text-white hover:bg-blue-600">
                Simpan Perubahan
            </button>
        </div>
    </form>
</main>

<script>
let editQuestionCount = 0;

function edit_exercise(id) {
    fetch(`/admin/exercises/${id}/data`)
        .then(response => response.json())
        .then(exercise => {
            currentExercise = exercise;

            const form = document.getElementById('edit_exercise_form');
            form.action = `/admin/exercises/${currentExercise.id}`;
            
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'PUT';
            form.appendChild(methodInput);
            
            document.getElementById('edit_title').value = currentExercise.title;
            document.getElementById('edit_description').value = currentExercise.description;
            document.getElementById('edit_icon').value = currentExercise.icon;
            
            const colorSelect = document.getElementById('edit_color');
            colorSelect.value = currentExercise.color;
            
            const container = document.getElementById('edit-questions-container');
            container.innerHTML = '';
            editQuestionCount = 0;
            
            if (currentExercise.questions && currentExercise.questions.length > 0) {
                currentExercise.questions.forEach(question => {
                    addEditQuestion(question);
                });
            }
            
            open_modal('edit_exercise_modal');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengambil data latihan');
        });
}

function addEditQuestion(questionData = null) {
    editQuestionCount++;
    const container = document.getElementById('edit-questions-container');
    const questionDiv = document.createElement('div');
    questionDiv.className = 'p-4 border-2 border-gray-200 rounded-xl space-y-4';
    
    const options = questionData?.options || { A: '', B: '', C: '', D: '' };
    
    questionDiv.innerHTML = `
        <div class="flex items-center justify-between">
            <h6 class="font-medium">Soal ${editQuestionCount}</h6>
            <button type="button" onclick="this.closest('.p-4').remove()"
                class="text-red-500 hover:text-red-600">
                <i class="fas fa-trash"></i>
            </button>
        </div>
        <div>
            <label class="block text-sm text-gray-600">Pertanyaan</label>
            <textarea name="questions[${editQuestionCount-1}][question]" required rows="2"
                class="mt-1 block resize-none w-full rounded-xl border-2 border-gray-200 p-3">${questionData?.question || ''}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm text-gray-600">Opsi A</label>
                <input type="text" name="questions[${editQuestionCount-1}][options][A]" required
                    value="${options.A}"
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
            </div>
            <div>
                <label class="block text-sm text-gray-600">Opsi B</label>
                <input type="text" name="questions[${editQuestionCount-1}][options][B]" required
                    value="${options.B}"
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
            </div>
            <div>
                <label class="block text-sm text-gray-600">Opsi C</label>
                <input type="text" name="questions[${editQuestionCount-1}][options][C]" required
                    value="${options.C}"
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
            </div>
            <div>
                <label class="block text-sm text-gray-600">Opsi D</label>
                <input type="text" name="questions[${editQuestionCount-1}][options][D]" required
                    value="${options.D}"
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
            </div>
        </div>
        <div>
            <label class="block text-sm text-gray-600">Jawaban Benar</label>
            <select name="questions[${editQuestionCount-1}][correct_answer]" required
                class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                <option value="A" ${questionData?.correct_answer === 'A' ? 'selected' : ''}>A</option>
                <option value="B" ${questionData?.correct_answer === 'B' ? 'selected' : ''}>B</option>
                <option value="C" ${questionData?.correct_answer === 'C' ? 'selected' : ''}>C</option>
                <option value="D" ${questionData?.correct_answer === 'D' ? 'selected' : ''}>D</option>
            </select>
        </div>
    `;
    container.appendChild(questionDiv);
}
</script>
@endcomponent 