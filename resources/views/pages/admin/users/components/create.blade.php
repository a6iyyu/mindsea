@component('layouts.admin-layout', ['judul' => 'Tambah Pengguna | Admin mindsea', 'deskripsi' => 'Tambah pengguna baru'])
    <div class="max-w-2xl mx-auto p-8 shadow-md rounded-xl border-4 border-gray-200">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Tambah Pengguna</h1>
        </header>

        @include('pages.admin.users.components.user-form', [
            'action' => route('admin.users.store'),
            'submitText' => 'Tambah Pengguna'
        ])
    </div>
@endcomponent
