<section class="mb-8 flex flex-col items-start justify-between gap-y-4 lg:flex-row lg:items-center">
    <h2 class="font-bold text-3xl text-gray-800">Kelola Materi</h2>
    <button
        onclick="open_modal('add_exercise_modal')"
        class="flex items-center gap-3 px-6 py-3 transition-colors rounded-xl bg-blue-500 text-white hover:bg-blue-600"
    >
        <i class="fas fa-plus"></i>
        <h5>Tambah Latihan</h5>
    </button>
</section>
@if(session('success'))
    <h4 class="mb-6 p-4 rounded-lg border bg-green-100 border-green-400 text-green-700">
        {{ session('success') }}
    </h4>
@endif
<section class="text-center rounded-xl border-4 border-gray-200 shadow-md overflow-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4">Judul</th>
                <th class="px-6 py-4">Tingkat Kesulitan</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
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
                        <a
                            onclick="toggleAktif('{{ $material->id }}')"
                            class="rounded-full px-3 py-1 text-sm cursor-pointer {{ $material->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ $material->is_active ? 'Aktif' : 'Nonaktif' }}
                        </a>
                    </td>
                    <td>
                        <span class="flex items-center justify-center gap-6">
                            <button
                                onclick='edit_material(@json($material->id), @json($material->title), @json($material->description), @json($material->difficulty_level), @json($material->contents))'
                                class="fas fa-edit text-blue-500 hover:text-blue-600"
                            ></button>
                            <form
                                action="{{ route('admin.materials.destroy', $material) }}"
                                method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?')"
                                class="inline"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fas fa-trash text-red-500 hover:text-red-600"></button>
                            </form>
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
<section class="mt-6">
    {{ $materials->links() }}
</section>

@include('components.admin.materials.edit-modal')
@include('components.admin.materials.add-modal')

<script>
    function edit_material(id, title, description, difficulty_level, contents) {
        const form = document.getElementById('edit_material_form');
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