@component('layouts.admin-layout', [
    'judul' => 'Tambah Pengguna',
    'deskripsi' => 'Tambah pengguna baru'
])
    <div class="max-w-2xl mx-auto p-8 shadow-md rounded-xl border-4 border-gray-200">
        <header class="mb-8 text-3xl font-bold text-gray-800">
            Tambah Pengguna
        </header>

        @include('components.admin.users.user-form', [
            'action' => route('admin.users.store'),
            'submitText' => 'Tambah Pengguna'
        ])
    </div>
@endcomponent