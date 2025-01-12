@component('layouts.admin-layout', ['judul' => 'Edit Pengguna | Admin mindsea', 'deskripsi' => 'Edit data pengguna'])
    <div class="max-w-2xl mx-auto p-8 shadow-md rounded-xl border-4 border-gray-200">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Edit Pengguna</h1>
        </header>

        @include('components.admin.users.user-form', [
            'action' => route('admin.users.update', $user),
            'method' => 'PUT',
            'submitText' => 'Simpan Perubahan',
            'user' => $user
        ])
    </div>
@endcomponent