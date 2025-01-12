<main class="container mx-auto">
    <header class="mb-8 flex items-center justify-between">
        <h2 class="text-3xl font-bold text-gray-800">Kelola Materi</h2>
        <button onclick="open_modal('add_material_modal')"
            class="rounded-xl bg-blue-500 px-6 py-3 text-white hover:bg-blue-600 transition-colors">
            <i class="fas fa-plus mr-2"></i>
            Tambah Materi
        </button>
    </header>

    @if(session('success'))
        <div class="mb-6 rounded-xl bg-green-100 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-md">
        <table class="w-full text-left text-gray-700">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Tingkat Kesulitan</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($materials as $material)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $material->title }}</td>
                        <td class="px-6 py-4">
                            <span class="rounded-full px-3 py-1 text-sm
                                        @if($material->difficulty_level === 'mudah')
                                            bg-green-100 text-green-700
                                        @elseif($material->difficulty_level === 'sedang')
                                            bg-yellow-100 text-yellow-700
                                        @else
                                            bg-red-100 text-red-700
                                        @endif
                                    ">
                                {{ ucfirst($material->difficulty_level) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a onclick="toggleAktif('{{ $material->id }}')" class="rounded-full px-3 py-1 text-sm cursor-pointer
                                {{ $material->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}
                            ">
                                {{ $material->is_active ? 'Aktif' : 'Nonaktif' }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <button
                                    onclick='editMaterial(@json($material->id), @json($material->title), @json($material->description), @json($material->difficulty_level), @json($material->contents))'
                                    class="text-blue-500 hover:text-blue-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.materials.destroy', $material) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?')"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $materials->links() }}
    </div>

    @include('pages.admin.materials.components.edit-modal')
    @include('pages.admin.materials.components.add-modal')
</main>

<script>
    function editMaterial(id, title, description, difficulty_level, contents) {
        const form = document.getElementById('editMaterialForm');
        form.action = `/admin/materials/${id}`;

        document.getElementById('edit_title').value = title;
        document.getElementById('edit_description').value = description;
        document.getElementById('edit_difficulty_level').value = difficulty_level;

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

        open_modal('edit_material_modal');
    }

    function open_modal(id_modal) {
        document.getElementById(id_modal).classList.remove('hidden');
    }

    function close_modal(id_modal) {
        document.getElementById(id_modal).classList.add('hidden');
    }

    function toggleAktif(id) {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/admin/materials/${id}/toggle-aktif`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.status !== undefined) {
                    const statusElement = document.querySelector(`a[onclick="toggleAktif(${id})"]`);
                    if (statusElement) {
                        statusElement.textContent = data.status ? 'Aktif' : 'Nonaktif';
                        statusElement.classList.remove(data.status ? 'bg-gray-100' : 'bg-green-100');
                        statusElement.classList.remove(data.status ? 'text-gray-700' : 'text-green-700');
                        statusElement.classList.add(data.status ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700');
                    }
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>