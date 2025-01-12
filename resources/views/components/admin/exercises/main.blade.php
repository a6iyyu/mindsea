<section class="mb-8 flex flex-col items-start justify-between gap-y-4 lg:flex-row lg:items-center">
    <h2 class="font-bold text-3xl text-gray-800">Kelola Latihan</h2>
    <button
        onclick="open_modal('add_exercise_modal')"
        class="flex items-center gap-3 px-6 py-3 transition-colors rounded-xl bg-blue-500 text-white hover:bg-blue-600"
    >
        <i class="fas fa-plus"></i>
        <h5>Tambah Latihan</h5>
    </button>
</section>
@if(session('success'))
    <h4 class="mb-4 p-4 rounded-lg border bg-green-100 border-green-400 text-green-700">
        {{ session('success') }}
    </h4>
@endif
<div class="text-center rounded-xl border-4 border-gray-200 shadow-md overflow-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4">Judul</th>
                <th class="px-6 py-4">Deskripsi</th>
                <th class="px-6 py-4">Total Soal</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($exercises as $exercise)
                <tr>
                    <td class="px-6 py-4">{{ $exercise->title }}</td>
                    <td class="px-6 py-4">{{ $exercise->description }}</td>
                    <td class="px-6 py-4">{{ $exercise->exercise->total_question ?? 0 }}</td>
                    <td class="px-6 py-4">
                        <span class="rounded-full px-3 py-1 text-sm {{ $exercise->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ $exercise->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <button onclick="edit_exercise('{{ $exercise->id }}')" class="fas fa-edit text-blue-500 hover:text-blue-600"></button>
                            <form
                                action="{{ route('admin.exercises.destroy', $exercise) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus latihan ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fas fa-trash text-red-500 hover:text-red-600"></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $exercises->links() }}
</div>

@include('components.admin.exercises.add-modal')
@include('components.admin.exercises.edit-modal')

<script>
    function open_modal(id_modal) {
        document.getElementById(id_modal).classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function close_modal(id_modal) {
        document.getElementById(id_modal).classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>