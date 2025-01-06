@component('pages.admin.materials.components.modal', ['id' => 'editMaterialModal', 'title' => 'Edit Materi'])
<form id="editMaterialForm" method="POST" class="space-y-6">
    @csrf
    @method('PUT')

    <!-- Basic Material Info -->
    <div>
        <label for="edit_title" class="block text-sm font-medium text-gray-700">Judul</label>
        <input type="text" name="title" id="edit_title" required
            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200">
    </div>

    <div>
        <label for="edit_description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" id="edit_description" rows="3" required
            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200"></textarea>
    </div>

    <div>
        <label for="edit_difficulty_level" class="block text-sm font-medium text-gray-700">Tingkat Kesulitan</label>
        <select name="difficulty_level" id="edit_difficulty_level" required
            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200">
            <option value="mudah">Mudah</option>
            <option value="sedang">Sedang</option>
            <option value="sulit">Sulit</option>
        </select>
    </div>

    <!-- Content Sections -->
    <div class="space-y-4">
        <h4 class="font-medium text-gray-700">Konten Materi</h4>

        <!-- Pengenalan Section -->
        <div class="rounded-xl border-2 border-gray-200 p-4">
            <h5 class="mb-4 font-medium text-gray-600">Pengenalan</h5>
            <input type="hidden" name="contents[0][section_type]" value="pengenalan">
            <input type="hidden" name="contents[0][id]" id="edit_introduction_id">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm text-gray-600">Judul</label>
                    <input type="text" name="contents[0][title]" id="edit_introduction_title" required
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                </div>
                <div>
                    <label class="block text-sm text-gray-600">Konten</label>
                    <textarea name="contents[0][content]" id="edit_introduction_content" rows="2" required
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
                </div>
                <div>
                    <label class="block text-sm text-gray-600">Teks Audio</label>
                    <input type="text" name="contents[0][audio_text]" id="edit_introduction_audio"
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                </div>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="rounded-xl border-2 border-gray-200 p-4">
            <h5 class="mb-4 font-medium text-gray-600">Materi Utama</h5>
            <input type="hidden" name="contents[1][section_type]" value="materi_utama">
            <input type="hidden" name="contents[1][id]" id="edit_main_id">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm text-gray-600">Judul</label>
                    <input type="text" name="contents[1][title]" id="edit_main_title" required
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                </div>
                <div>
                    <label class="block text-sm text-gray-600">Konten</label>
                    <textarea name="contents[1][content]" id="edit_main_content" rows="2" required
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
                </div>
                <div>
                    <label class="block text-sm text-gray-600">Teks Audio</label>
                    <input type="text" name="contents[1][audio_text]" id="edit_main_audio"
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                </div>
            </div>
        </div>

        <!-- Exercise Section -->
        <div class="rounded-xl border-2 border-gray-200 p-4">
            <h5 class="mb-4 font-medium text-gray-600">Latihan</h5>
            <input type="hidden" name="contents[2][section_type]" value="latihan">
            <input type="hidden" name="contents[2][id]" id="edit_exercise_id">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm text-gray-600">Judul</label>
                    <input type="text" name="contents[2][title]" id="edit_exercise_title" required
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                </div>
                <div>
                    <label class="block text-sm text-gray-600">Konten</label>
                    <textarea name="contents[2][content]" id="edit_exercise_content" rows="2" required
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
                </div>
                <div>
                    <label class="block text-sm text-gray-600">Teks Audio</label>
                    <input type="text" name="contents[2][audio_text]" id="edit_exercise_audio"
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-end gap-4">
        <button type="button" onclick="closeModal('editMaterialModal')"
            class="rounded-xl bg-gray-100 px-6 py-3 text-gray-700 hover:bg-gray-200">
            Batal
        </button>
        <button type="submit" class="rounded-xl bg-blue-500 px-6 py-3 text-white hover:bg-blue-600">
            Simpan Perubahan
        </button>
    </div>
</form>
@endcomponent

<script>
    function editMaterial(id, title, description, difficulty_level, contents) {
        const form = document.getElementById('editMaterialForm');
        form.action = `/admin/materials/${id}`;

        // Set basic material info
        document.getElementById('edit_title').value = title;
        document.getElementById('edit_description').value = description;
        document.getElementById('edit_difficulty_level').value = difficulty_level;

        // Set content values
        contents.forEach(content => {
            const sectionType = content.section_type;
            switch (sectionType) {
                case 'pengenalan':
                    document.getElementById('edit_introduction_id').value = content.id;
                    document.getElementById('edit_introduction_title').value = content.title;
                    document.getElementById('edit_introduction_content').value = content.content;
                    document.getElementById('edit_introduction_audio').value = content.audio_text || '';
                    break;
                case 'materi_utama':
                    document.getElementById('edit_main_id').value = content.id;
                    document.getElementById('edit_main_title').value = content.title;
                    document.getElementById('edit_main_content').value = content.content;
                    document.getElementById('edit_main_audio').value = content.audio_text || '';
                    break;
                case 'latihan':
                    document.getElementById('edit_exercise_id').value = content.id;
                    document.getElementById('edit_exercise_title').value = content.title;
                    document.getElementById('edit_exercise_content').value = content.content;
                    document.getElementById('edit_exercise_audio').value = content.audio_text || '';
                    break;
            }
        });

        openModal('editMaterialModal');
    }
</script>