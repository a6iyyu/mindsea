@component('components.admin.materials.modal', ['id' => 'edit_material_modal', 'title' => 'Edit Materi'])
<form id="edit_material_form" method="POST" class="space-y-6" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="edit_title" class="block text-sm font-medium text-gray-700">
            Judul
        </label>
        <input type="text" name="title" id="edit_title" required
            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200" />
    </fieldset>

    <fieldset>
        <label for="edit_description" class="block text-sm font-medium text-gray-700">
            Deskripsi
        </label>
        <textarea name="description" id="edit_description" rows="3" required
            class="mt-1 block w-full rounded-xl resize-none border-2 border-gray-200 p-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200"></textarea>
    </fieldset>

    <fieldset>
        <label for="edit_difficulty_level" class="block text-sm font-medium text-gray-700">
            Tingkat Kesulitan
        </label>
        <select name="difficulty_level" id="edit_difficulty_level" required
            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200">
            <option value="mudah">Mudah</option>
            <option value="sedang">Sedang</option>
            <option value="sulit">Sulit</option>
        </select>
    </fieldset>

    <div class="space-y-4">
        <h4 class="font-medium text-gray-700">Konten Materi</h4>

        <!-- Color Selection -->
        <div class="rounded-xl border-2 border-gray-200 p-4">
            <h5 class="mb-4 font-medium text-gray-600">Warna</h5>
            <select name="color" id="edit_color"
                class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200"
                required>
                <option value="blue">Biru</option>
                <option value="green">Hijau</option>
                <option value="yellow">Kuning</option>
                <option value="red">Merah</option>
                <option value="purple">Ungu</option>
                <option value="orange">Orange</option>
                <option value="pink">Pink</option>
                <option value="gray">Abu-abu</option>
                <option value="violet">Violet</option>
                <option value="indigo">Indigo</option>
                <option value="amber">Amber</option>
                <option value="emerald">Emerald</option>
                <option value="teal">Teal</option>
                <option value="cyan">Cyan</option>
                <option value="sky">Sky</option>
                <option value="lime">Lime</option>
                <option value="fuchsia">Fuchsia</option>
            </select>
        </div>

        <!-- Pengenalan Section -->
        <div class="rounded-xl border-2 border-gray-200 p-4">
            <h5 class="mb-4 font-medium text-gray-600">Pengenalan</h5>
            <input type="hidden" name="contents[0][section_type]" value="pengenalan">
            <input type="hidden" name="contents[0][id]" id="edit_introduction_id">
            <div class="space-y-4">
                <fieldset>
                    <label class="block text-sm text-gray-600">Judul</label>
                    <input type="text" name="contents[0][title]" id="edit_introduction_title" required
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3" />
                </fieldset>
                <fieldset>
                    <label class="block text-sm text-gray-600">Konten</label>
                    <textarea name="contents[0][content]" id="edit_introduction_content" rows="2" required
                        class="mt-1 resize-none block w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
                </fieldset>
                <fieldset>
                    <label class="block text-sm text-gray-600">Teks Audio</label>
                    <input type="text" name="contents[0][audio_text]" id="edit_introduction_audio"
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3" />
                </fieldset>
                <fieldset>
                    <label class="block text-sm text-gray-600">Gambar</label>
                    <input type="file" name="contents[0][image]" id="edit_introduction_image" accept="image/*"
                        class="mt-1 block w-full">
                    <img id="edit_introduction_image_preview" src="#" alt="Preview Gambar" class="mt-2 max-h-40 hidden">
                </fieldset>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="rounded-xl border-2 border-gray-200 p-4">
            <h5 class="mb-4 font-medium text-gray-600">Materi Utama</h5>
            <input type="hidden" name="contents[1][section_type]" value="materi_utama">
            <input type="hidden" name="contents[1][id]" id="edit_main_id">
            <div class="space-y-4">
                <fieldset>
                    <label class="block text-sm text-gray-600">Judul</label>
                    <input type="text" name="contents[1][title]" id="edit_main_title" required
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3" />
                </fieldset>
                <fieldset>
                    <label class="block text-sm text-gray-600">Konten</label>
                    <textarea name="contents[1][content]" id="edit_main_content" rows="2" required
                        class="mt-1 resize-none block w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
                </fieldset>
                <fieldset>
                    <label class="block text-sm text-gray-600">Teks Audio</label>
                    <input type="text" name="contents[1][audio_text]" id="edit_main_audio"
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3" />
                </fieldset>
                <fieldset>
                    <label class="block text-sm text-gray-600">Gambar</label>
                    <input type="file" name="contents[1][image]" id="edit_main_image" accept="image/*"
                        class="mt-1 block w-full">
                    <img id="edit_main_image_preview" src="#" alt="Preview Gambar" class="mt-2 max-h-40 hidden">
                </fieldset>
            </div>
        </div>

        <!-- Exercise Section -->
        <div class="rounded-xl border-2 border-gray-200 p-4">
            <h5 class="mb-4 font-medium text-gray-600">Latihan</h5>
            <input type="hidden" name="contents[2][section_type]" value="latihan">
            <input type="hidden" name="contents[2][id]" id="edit_exercise_id">
            <div class="space-y-4">
                <fieldset>
                    <label class="block text-sm text-gray-600">Judul</label>
                    <input type="text" name="contents[2][title]" id="edit_exercise_title" required
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3" />
                </fieldset>
                <fieldset>
                    <label class="block text-sm text-gray-600">Konten</label>
                    <textarea name="contents[2][content]" id="edit_exercise_content" rows="2" required
                        class="mt-1 block resize-none w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
                </fieldset>
                <fieldset>
                    <label class="block text-sm text-gray-600">Teks Audio</label>
                    <input type="text" name="contents[2][audio_text]" id="edit_exercise_audio"
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3" />
                </fieldset>
                <fieldset>
                    <label class="block text-sm text-gray-600">Gambar</label>
                    <input type="file" name="contents[2][image]" id="edit_exercise_image" accept="image/*"
                        class="mt-1 block w-full">
                    <img id="edit_exercise_image_preview" src="#" alt="Preview Gambar" class="mt-2 max-h-40 hidden">
                </fieldset>
            </div>
        </div>
    </div>

    <footer class="flex justify-end gap-4">
        <button type="button" onclick="close_modal('edit_material_modal')"
            class="rounded-xl bg-gray-100 px-6 py-3 text-gray-700 hover:bg-gray-200">
            Batal
        </button>
        <button type="submit" class="rounded-xl bg-blue-500 px-6 py-3 text-white hover:bg-blue-600">
            Simpan Perubahan
        </button>
    </footer>
</form>
@endcomponent

<script>
    function edit_material(id, title, description, difficulty_level, contents, color) {        
        const form = document.getElementById('edit_material_form');
        form.action = `/admin/materials/${id}`;

        document.getElementById('edit_title').value = title;
        document.getElementById('edit_description').value = description;
        document.getElementById('edit_difficulty_level').value = difficulty_level;
        document.getElementById('edit_color').value = color;

        contents.forEach(content => {
            const sectionType = content.section_type;
            switch (sectionType) {
                case 'pengenalan':
                    document.getElementById('edit_introduction_id').value = content.id;
                    document.getElementById('edit_introduction_title').value = content.title;
                    document.getElementById('edit_introduction_content').value = content.content;
                    document.getElementById('edit_introduction_audio').value = content.audio_text || '';
                    if (content.image_path) {
                        document.getElementById('edit_introduction_image_preview').src = `/storage/${content.image_path}`;
                        document.getElementById('edit_introduction_image_preview').classList.remove('hidden');
                    }
                    break;
                case 'materi_utama':
                    document.getElementById('edit_main_id').value = content.id;
                    document.getElementById('edit_main_title').value = content.title;
                    document.getElementById('edit_main_content').value = content.content;
                    document.getElementById('edit_main_audio').value = content.audio_text || '';
                    if (content.image_path) {
                        document.getElementById('edit_main_image_preview').src = `/storage/${content.image_path}`;
                        document.getElementById('edit_main_image_preview').classList.remove('hidden');
                    }
                    break;
                case 'latihan':
                    document.getElementById('edit_exercise_id').value = content.id;
                    document.getElementById('edit_exercise_title').value = content.title;
                    document.getElementById('edit_exercise_content').value = content.content;
                    document.getElementById('edit_exercise_audio').value = content.audio_text || '';
                    if (content.image_path) {
                        document.getElementById('edit_exercise_image_preview').src = `/storage/${content.image_path}`;
                        document.getElementById('edit_exercise_image_preview').classList.remove('hidden');
                    }
                    break;
            }
        });

        open_modal('edit_material_modal');
    }

    function showImagePreview(input, previewId) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = document.getElementById(previewId);
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById('edit_introduction_image').addEventListener('change', function () {
        showImagePreview(this, 'edit_introduction_image_preview');
    });

    document.getElementById('edit_main_image').addEventListener('change', function () {
        showImagePreview(this, 'edit_main_image_preview');
    });

    document.getElementById('edit_exercise_image').addEventListener('change', function () {
        showImagePreview(this, 'edit_exercise_image_preview');
    });
</script>