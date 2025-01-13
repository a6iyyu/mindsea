@component('components.admin.materials.modal', ['id' => 'add_material_modal', 'title' => 'Tambah Materi'])
    <form action="{{ route('admin.materials.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf
        
        <div>
            <label for="add_title" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" id="add_title" required
                class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200">
        </div>

        <div>
            <label for="add_description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" id="add_description" rows="3" required
                class="mt-1 block resize-none w-full rounded-xl border-2 border-gray-200 p-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200"></textarea>
        </div>

        <div>
            <label for="add_difficulty_level" class="block text-sm font-medium text-gray-700">Tingkat Kesulitan</label>
            <select name="difficulty_level" id="add_difficulty_level" required
                class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200">
                <option value="mudah">Mudah</option>
                <option value="sedang">Sedang</option>
                <option value="sulit">Sulit</option>
            </select>
        </div>

        <div class="space-y-4">
            <h4 class="font-medium text-gray-700">Konten Materi</h4>
            
            <div class="rounded-xl border-2 border-gray-200 p-4">
                <h5 class="mb-4 font-medium text-gray-600">Pengenalan</h5>
                <input type="hidden" name="contents[0][section_type]" value="pengenalan">
                <input type="hidden" name="contents[0][id]" id="add_introduction_id">
                <div class="space-y-4">
                    <fieldset>
                        <label class="block text-sm text-gray-600">Judul</label>
                        <input
                            type="text"
                            name="contents[0][title]"
                            id="add_introduction_title"
                            required
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3"
                        />
                    </fieldset>
                    <fieldset>
                        <label class="block text-sm text-gray-600">Konten</label>
                        <textarea
                            name="contents[0][content]"
                            id="add_introduction_content"
                            rows="2"
                            required
                            class="mt-1 resize-none block w-full rounded-xl border-2 border-gray-200 p-3"
                        ></textarea>
                    </fieldset>
                    <fieldset>
                        <label class="block text-sm text-gray-600">Teks Audio</label>
                        <input
                            type="text"
                            name="contents[0][audio_text]"
                            id="add_introduction_audio"
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3"
                        />
                    </fieldset>
                    <fieldset>
                        <label class="block text-sm text-gray-600">Gambar</label>
                        <input type="file" name="contents[0][image]" id="add_introduction_image" accept="image/*"
                            class="mt-1 block w-full">
                        <img id="add_introduction_image_preview" src="#" alt="Preview Gambar" class="mt-2 max-h-40 hidden">
                    </fieldset>
                </div>
            </div>

            <div class="rounded-xl border-2 border-gray-200 p-4">
                <h5 class="mb-4 font-medium text-gray-600">Materi Utama</h5>
                <input type="hidden" name="contents[1][section_type]" value="materi_utama">
                <input type="hidden" name="contents[1][id]" id="add_main_id">
                <div class="space-y-4">
                    <fieldset>
                        <label class="block text-sm text-gray-600">Judul</label>
                        <input type="text" name="contents[1][title]" id="add_main_title" required
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    </fieldset>
                    <fieldset>
                        <label class="block text-sm text-gray-600">Konten</label>
                        <textarea name="contents[1][content]" id="add_main_content" rows="2" required
                            class="mt-1 block resize-none w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
                    </fieldset>
                    <fieldset>
                        <label class="block text-sm text-gray-600">Teks Audio</label>
                        <input type="text" name="contents[1][audio_text]" id="add_main_audio"
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    </fieldset>
                    <fieldset>
                        <label class="block text-sm text-gray-600">Gambar</label>
                        <input type="file" name="contents[1][image]" id="add_main_image" accept="image/*"
                            class="mt-1 block w-full">
                        <img id="add_main_image_preview" src="#" alt="Preview Gambar" class="mt-2 max-h-40 hidden">
                    </fieldset>
                </div>
            </div>

            <div class="rounded-xl border-2 border-gray-200 p-4">
                <h5 class="mb-4 font-medium text-gray-600">Latihan</h5>
                <input type="hidden" name="contents[2][section_type]" value="latihan">
                <input type="hidden" name="contents[2][id]" id="add_exercise_id">
                <div class="space-y-4">
                    <fieldset>
                        <label class="block text-sm text-gray-600">Judul</label>
                        <input type="text" name="contents[2][title]" id="add_exercise_title" required
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    </fieldset>
                    <fieldset>
                        <label class="block text-sm text-gray-600">Konten</label>
                        <textarea name="contents[2][content]" id="add_exercise_content" rows="2" required
                            class="mt-1 block resize-none w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
                    </fieldset>
                    <fieldset>
                        <label class="block text-sm text-gray-600">Teks Audio</label>
                        <input type="text" name="contents[2][audio_text]" id="add_exercise_audio"
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    </fieldset>
                    <fieldset>
                        <label class="block text-sm text-gray-600">Gambar</label>
                        <input type="file" name="contents[2][image]" id="add_exercise_image" accept="image/*"
                            class="mt-1 block w-full">
                        <img id="add_exercise_image_preview" src="#" alt="Preview Gambar" class="mt-2 max-h-40 hidden">
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-4">
            <button type="button" onclick="close_modal('add_material_modal')"
                class="rounded-xl bg-gray-100 px-6 py-3 text-gray-700 hover:bg-gray-200">
                Batal
            </button>
            <button type="submit"
                class="rounded-xl bg-blue-500 px-6 py-3 text-white hover:bg-blue-600">
                Tambah Materi
            </button>
        </div>
    </form>
@endcomponent

<script>
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

    document.getElementById('add_introduction_image').addEventListener('change', function () {
        showImagePreview(this, 'add_introduction_image_preview');
    });

    document.getElementById('add_main_image').addEventListener('change', function () {
        showImagePreview(this, 'add_main_image_preview');
    });

    document.getElementById('add_exercise_image').addEventListener('change', function () {
        showImagePreview(this, 'add_exercise_image_preview');
    });
</script>