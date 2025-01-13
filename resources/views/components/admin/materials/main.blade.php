<section class="mb-8 flex flex-col items-start justify-between gap-y-4 lg:flex-row lg:items-center">
    <h2 class="font-bold text-3xl text-gray-800">Kelola Materi</h2>
    <button
        onclick="open_modal('add_material_modal')"
        class="flex items-center gap-3 px-6 py-3 transition-colors rounded-xl bg-blue-500 text-white hover:bg-blue-600"
    >
        <i class="fas fa-plus"></i>
        <h5>Tambah Materi</h5>
    </button>
</section>

<div id="status-message" class="hidden mb-6 p-4 rounded-lg border bg-green-100 border-green-400 text-green-700"></div>

@if(session('success'))
    <h4 class="mb-6 p-4 rounded-lg border bg-green-100 border-green-400 text-green-700">
        {{ session('success') }}
    </h4>
@endif
<section class="mb-6">
    <form action="{{ route('admin.materials.index') }}" method="GET" class="flex items-center gap-4">
        <input type="text" name="search" placeholder="Cari materi..." value="{{ request('search') }}"
            class="px-4 py-2 border rounded-md">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
            Cari
        </button>
    </form>
</section>
<section class="text-center rounded-xl border-4 border-gray-200 shadow-md overflow-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4">ID</th>
                <th class="px-6 py-4">Judul</th>
                <th class="px-6 py-4">Tingkat Kesulitan</th>
                <th class="px-6 py-4">Warna</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($materials as $material)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $material->id }}
                    </td>
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
                        <span class="rounded-full px-3 py-1 text-sm
                           @switch($material->color)
                               @case('blue')
                                   bg-blue-100 text-blue-700
                                   @break
                               @case('green')
                                   bg-green-100 text-green-700
                                   @break
                               @case('yellow')
                                   bg-yellow-100 text-yellow-700
                                   @break
                               @case('red')
                                   bg-red-100 text-red-700
                                   @break
                               @case('purple')
                                   bg-purple-100 text-purple-700
                                   @break
                               @case('orange')
                                   bg-orange-100 text-orange-700
                                   @break
                               @case('pink')
                                   bg-pink-100 text-pink-700
                                   @break
                               @case('gray')
                                   bg-gray-100 text-gray-700
                                   @break
                               @case('violet')
                                   bg-violet-100 text-violet-700
                                   @break
                               @case('indigo')
                                   bg-indigo-100 text-indigo-700
                                   @break
                               @case('amber')
                                   bg-amber-100 text-amber-700
                                   @break
                               @case('emerald')
                                   bg-emerald-100 text-emerald-700
                                   @break
                               @case('teal')
                                   bg-teal-100 text-teal-700
                                   @break
                               @case('cyan')
                                   bg-cyan-100 text-cyan-700
                                   @break
                               @case('sky')
                                   bg-sky-100 text-sky-700
                                   @break
                               @case('lime')
                                   bg-lime-100 text-lime-700
                                   @break
                               @case('fuchsia')
                                   bg-fuchsia-100 text-fuchsia-700
                                   @break
                           @endswitch
                        ">
                            {{ ucfirst($material->color) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <a
                            onclick="toggleStatus('{{ $material->id }}')"
                            class="cursor-pointer rounded-full px-3 py-1 text-sm {{ $material->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ $material->is_active ? 'Aktif' : 'Nonaktif' }}
                        </a>
                    </td>
                    <td>
                        <span class="flex items-center justify-center gap-6">
                            <button
                                onclick="edit_material('{{ $material->id }}', '{{ $material->title }}', '{{ $material->description }}', '{{ $material->difficulty_level }}', {{ json_encode($material->contents) }}, '{{ $material->color }}')"
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
        const modal = document.getElementById(id_modal);
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            console.error(`Modal with id ${id_modal} not found`);
        }
    }

    function close_modal(id_modal) {
        const modal = document.getElementById(id_modal);
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('fixed')) {
            const modals = document.querySelectorAll('.fixed.inset-0.z-50');
            modals.forEach(modal => {
                if (!modal.classList.contains('hidden')) {
                    close_modal(modal.id);
                }
            });
        }
    });

    function toggleStatus(id) {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/admin/materials/${id}/toggle-status`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const statusMessage = document.getElementById('status-message');
                statusMessage.textContent = data.message;
                statusMessage.classList.remove('hidden');

                setTimeout(() => {
                    statusMessage.classList.add('hidden');
                }, 2000);

                const statusElement = document.querySelector(`a[onclick="toggleStatus('${id}')"]`);
                if (statusElement) {
                    statusElement.textContent = data.status ? 'Aktif' : 'Nonaktif';
                    statusElement.classList.remove('bg-gray-100', 'text-gray-700', 'bg-green-100', 'text-green-700');
                    if (data.status) {
                        statusElement.classList.add('bg-green-100');
                        statusElement.classList.add('text-green-700');
                    } else {
                        statusElement.classList.add('bg-gray-100');
                        statusElement.classList.add('text-gray-700');
                    }
                }
            } else {
                const statusMessage = document.getElementById('status-message');
                statusMessage.textContent = data.message;
                statusMessage.classList.remove('hidden', 'bg-green-100', 'border-green-400', 'text-green-700');
                statusMessage.classList.add('bg-red-100', 'border-red-400', 'text-red-700');
                statusMessage.classList.remove('hidden');

                setTimeout(() => {
                    statusMessage.classList.add('hidden');
                }, 2000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            const statusMessage = document.getElementById('status-message');
            statusMessage.textContent = 'Terjadi kesalahan saat mengubah status materi';
            statusMessage.classList.remove('hidden', 'bg-green-100', 'border-green-400', 'text-green-700');
            statusMessage.classList.add('bg-red-100', 'border-red-400', 'text-red-700');
            statusMessage.classList.remove('hidden');

            setTimeout(() => {
                statusMessage.classList.add('hidden');
            }, 2000);
        });
    }
</script>