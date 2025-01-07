<main class="container mx-auto">
    <header class="mb-8 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">Kelola Latihan</h2>
        <button onclick="openModal('addExerciseModal')"
            class="rounded-xl bg-blue-500 px-6 py-3 text-white hover:bg-blue-600 transition-colors">
            <i class="fas fa-plus mr-2"></i>
            Tambah Latihan
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
                    <th class="px-6 py-4">Deskripsi</th>
                    <th class="px-6 py-4">Total Soal</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($exercises as $exercise)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $exercise->title }}</td>
                        <td class="px-6 py-4">{{ $exercise->description }}</td>
                        <td class="px-6 py-4">{{ $exercise->exercise->total_question ?? 0 }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="rounded-full px-3 py-1 text-sm
                                    {{ $exercise->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ $exercise->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <button onclick="editExercise({{ $exercise->id }})"
                                    class="text-blue-500 hover:text-blue-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.exercises.destroy', $exercise) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus latihan ini?')"
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
        {{ $exercises->links() }}
    </div>

    @include('pages.admin.exercises.components.add-modal')
    @include('pages.admin.exercises.components.edit-modal')
</main>


<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>