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

    <div class="grid grid-cols-2 gap-4">
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
        <fieldset>
            <label for="edit_color" class="block text-sm font-medium text-gray-700">
                Warna
            </label>
            <select name="color" id="edit_color" required
                class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200">
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
        </fieldset>
    </div>


    <div class="space-y-4">
        <h4 class="font-medium text-gray-700">Konten Materi</h4>

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
                    <div class="image-preview-container">
                        <input type="file" name="contents[0][image]" id="edit_introduction_image" accept="image/*"
                            class="mt-1 block w-full">
                        <div class="relative mt-2">
                            <img id="edit_introduction_image_preview" src="#" alt="Preview Gambar" 
                                class="hidden max-h-40 rounded-lg">
                            <button type="button" id="edit_introduction_delete_button"
                                onclick="deleteImage('introduction')"
                                class="delete-image absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full hover:bg-red-600 hidden">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
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
                    <div class="image-preview-container">
                        <input type="file" name="contents[1][image]" id="edit_main_image" accept="image/*"
                            class="mt-1 block w-full">
                        <div class="relative mt-2">
                            <img id="edit_main_image_preview" src="#" alt="Preview Gambar" 
                                class="hidden max-h-40 rounded-lg">
                            <button type="button" 
                                onclick="deleteImage('main')"
                                class="delete-image absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full hover:bg-red-600 hidden">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
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
                    <div class="image-preview-container">
                        <input type="file" name="contents[2][image]" id="edit_exercise_image" accept="image/*"
                            class="mt-1 block w-full">
                        <div class="relative mt-2">
                            <img id="edit_exercise_image_preview" src="#" alt="Preview Gambar" 
                                class="hidden max-h-40 rounded-lg">
                            <button type="button" 
                                onclick="deleteImage('exercise')"
                                class="delete-image absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full hover:bg-red-600 hidden">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
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
                        const preview = document.getElementById('edit_introduction_image_preview');
                        const deleteBtn = document.getElementById('edit_introduction_delete_button');
                        preview.src = `/storage/${content.image_path}`;
                        preview.classList.remove('hidden');
                        deleteBtn.classList.remove('hidden');
                    }
                    break;
                case 'materi_utama':
                    document.getElementById('edit_main_id').value = content.id;
                    document.getElementById('edit_main_title').value = content.title;
                    document.getElementById('edit_main_content').value = content.content;
                    document.getElementById('edit_main_audio').value = content.audio_text || '';
                    if (content.image_path) {
                        const preview = document.getElementById('edit_main_image_preview');
                        const deleteBtn = document.getElementById('edit_main_delete_button');
                        preview.src = `/storage/${content.image_path}`;
                        preview.classList.remove('hidden');
                        deleteBtn.classList.remove('hidden');
                    }
                    break;
                case 'latihan':
                    document.getElementById('edit_exercise_id').value = content.id;
                    document.getElementById('edit_exercise_title').value = content.title;
                    document.getElementById('edit_exercise_content').value = content.content;
                    document.getElementById('edit_exercise_audio').value = content.audio_text || '';
                    if (content.image_path) {
                        const preview = document.getElementById('edit_exercise_image_preview');
                        const deleteBtn = document.getElementById('edit_exercise_delete_button');
                        preview.src = `/storage/${content.image_path}`;
                        preview.classList.remove('hidden');
                        deleteBtn.classList.remove('hidden');
                    }
                    break;
            }
        });

        open_modal('edit_material_modal');
    }

    function handleImagePreview(inputId, previewId, deleteButtonId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const deleteButton = document.getElementById(deleteButtonId);
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                deleteButton.classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function deleteImage(section) {
        const preview = document.getElementById(`edit_${section}_image_preview`);
        const input = document.getElementById(`edit_${section}_image`);
        const deleteButton = document.getElementById(`edit_${section}_delete_button`);
        
        preview.src = '#';
        preview.classList.add('hidden');
        input.value = '';
        deleteButton.classList.add('hidden');
        
        const deleteFlag = document.createElement('input');
        deleteFlag.type = 'hidden';
        deleteFlag.name = `contents[${section}][delete_image]`;
        deleteFlag.value = '1';
        input.parentNode.appendChild(deleteFlag);
    }

    document.getElementById('edit_introduction_image').addEventListener('change', function() {
        handleImagePreview('edit_introduction_image', 'edit_introduction_image_preview', 'edit_introduction_delete_button');
    });

    document.getElementById('edit_main_image').addEventListener('change', function() {
        handleImagePreview('edit_main_image', 'edit_main_image_preview', 'edit_main_delete_button');
    });

    document.getElementById('edit_exercise_image').addEventListener('change', function() {
        handleImagePreview('edit_exercise_image', 'edit_exercise_image_preview', 'edit_exercise_delete_button');
    });
</script>