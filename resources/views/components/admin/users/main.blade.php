<section class="mb-8 flex flex-col items-start justify-between gap-y-4 lg:flex-row lg:items-center">
    <h2 class="font-bold text-3xl text-gray-800">Kelola Pengguna</h2>
    <a
        href="{{ route('admin.users.create') }}"
        class="flex items-center gap-3 px-6 py-3 transition-colors rounded-xl bg-blue-500 text-white hover:bg-blue-600"
    >
        <i class="fas fa-plus"></i>
        <h5>Tambah Pengguna</h5>
    </a>
</section>
@if(session('success'))
    <h4 class="mb-6 p-4 rounded-lg border bg-green-100 border-green-400 text-green-700">
        {{ session('success') }}
    </h4>
@endif
<section class="rounded-xl border-4 border-gray-200 shadow-md overflow-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bergabung</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
                <tr>
                    <td class="font-medium text-sm px-6 py-4 whitespace-nowrap text-gray-900">
                        {{ $user->name }}
                    </td>
                    <td class="text-sm px-6 py-4 whitespace-nowrap text-gray-500">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_admin ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                            {{ $user->is_admin ? 'Admin' : 'User' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $user->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <span class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="fas fa-edit text-blue-600 hover:text-blue-900"></a>
                            <form
                                action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fas fa-trash text-red-600 hover:text-red-900"></button>
                            </form>
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
<section class="mt-4">
    {{ $users->links() }}
</section>