@component('components.admin.materials.modal', ['id' => 'add_material_modal', 'title' => 'Tambah Materi'])
    <form action="{{ route('admin.materials.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" id="title" required
                class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" id="description" rows="3" required
                class="mt-1 block resize-none w-full rounded-xl border-2 border-gray-200 p-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200"></textarea>
        </div>

        <div>
            <label for="difficulty_level" class="block text-sm font-medium text-gray-700">Tingkat Kesulitan</label>
            <select name="difficulty_level" id="difficulty_level" required
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
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-600">Judul</label>
                        <input type="text" name="contents[0][title]" required
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Konten</label>
                        <textarea name="contents[0][content]" rows="2" required
                            class="mt-1 block resize-none w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Teks Audio</label>
                        <input type="text" name="contents[0][audio_text]"
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    </div>
                </div>
            </div>

            <div class="rounded-xl border-2 border-gray-200 p-4">
                <h5 class="mb-4 font-medium text-gray-600">Materi Utama</h5>
                <input type="hidden" name="contents[1][section_type]" value="materi_utama">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-600">Judul</label>
                        <input type="text" name="contents[1][title]" required
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Konten</label>
                        <textarea name="contents[1][content]" rows="2" required
                            class="mt-1 block resize-none w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Teks Audio</label>
                        <input type="text" name="contents[1][audio_text]"
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    </div>
                </div>
            </div>

            <div class="rounded-xl border-2 border-gray-200 p-4">
                <h5 class="mb-4 font-medium text-gray-600">Latihan</h5>
                <input type="hidden" name="contents[2][section_type]" value="latihan">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-600">Judul</label>
                        <input type="text" name="contents[2][title]" required
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Konten</label>
                        <textarea name="contents[2][content]" rows="2" required
                            class="mt-1 block resize-none w-full rounded-xl border-2 border-gray-200 p-3"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Teks Audio</label>
                        <input type="text" name="contents[2][audio_text]"
                            class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    </div>
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