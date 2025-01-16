<section class="mb-8 flex flex-col items-start justify-between gap-y-4 lg:flex-row lg:items-center">
    <h2 class="font-bold text-3xl text-gray-800">Kelola Pengguna</h2>
    <button
        onclick="open_modal('add_user_modal')"
        class="flex items-center gap-3 px-6 py-3 transition-colors rounded-xl bg-blue-500 text-white hover:bg-blue-600"
    >
        <i class="fas fa-plus"></i>
        <h5>Tambah Pengguna</h5>
    </button>
</section>

<div id="success-message" class="hidden mb-6 p-4 rounded-lg border bg-green-100 border-green-400 text-green-700"></div>

<div id="error-message" class="hidden mb-6 p-4 rounded-lg border bg-red-100 border-red-400 text-red-700"></div>

@if(session('success'))
    <h4 class="mb-6 p-4 rounded-lg border bg-green-100 border-green-400 text-green-700">
        {{ session('success') }}
    </h4>
@endif

@if(session('error'))
    <h4 class="mb-6 p-4 rounded-lg border bg-red-100 border-red-400 text-red-700">
        {{ session('error') }}
    </h4>
@endif

<section class="mb-6">
    <form action="{{ route('admin.users.index') }}" method="GET" class="flex items-center gap-4">
        <input type="text" name="search" placeholder="Cari pengguna..." value="{{ request('search') }}"
            class="px-4 py-2 border rounded-md">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
            Cari
        </button>
    </form>
</section>
<section class="rounded-xl border-4 border-gray-200 shadow-md overflow-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
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
                    <td class="font-medium text-sm px-6 py-4 whitespace-nowrap text-gray-900" data-user-id="{{ $user->id }}">
                        {{ $user->id }}
                    </td>
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
                            <button
                                onclick='edit_user(@json($user->id), @json($user->name), @json($user->email), @json($user->is_admin))'
                                class="fas fa-edit text-blue-500 hover:text-blue-600">
                            </button>
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

@include('components.admin.users.user-modal', [
    'id' => 'add_user_modal',
    'title' => 'Tambah Pengguna',
    'submitText' => 'Tambah Pengguna',
    'action' => route('admin.users.store'),
    'isEdit' => false
])

@include('components.admin.users.user-modal', [
    'id' => 'edit_user_modal',
    'title' => 'Edit Pengguna',
    'submitText' => 'Simpan Perubahan',
    'action' => '#',
    'isEdit' => true
])

<script>
    let currentModal = null;

    function open_modal(id_modal) {
        const modal = document.getElementById(id_modal);
        if (modal) {
            if (currentModal) {
                currentModal.classList.add('hidden');
            }
            
            currentModal = modal;
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
        if (event.target.classList.contains('fixed') && currentModal) {
            close_modal(currentModal.id);
        }
    });

    function showMessage(type, message) {
        const successMessage = document.getElementById('success-message');
        const errorMessage = document.getElementById('error-message');
        
        successMessage.classList.add('hidden');
        errorMessage.classList.add('hidden');
        
        if (type === 'success') {
            successMessage.textContent = message;
            successMessage.classList.remove('hidden');
        } else {
            errorMessage.textContent = message;
            errorMessage.classList.remove('hidden');
        }
        
        setTimeout(() => {
            if (type === 'success') {
                successMessage.classList.add('hidden');
            } else {
                errorMessage.classList.add('hidden');
            }
        }, 3000);
    }

    function edit_user(id, name, email, is_admin) {
        try {
            const modal = document.getElementById('edit_user_modal');
            const form = modal.querySelector('form');
            
            form.action = `/admin/users/${id}`;
            
            form.querySelector('input[name="name"]').value = name;
            form.querySelector('input[name="email"]').value = email;
            form.querySelector('select[name="is_admin"]').value = is_admin ? "1" : "0";
            
            open_modal('edit_user_modal');
        } catch (error) {
            showMessage('error', 'Terjadi kesalahan saat memuat data pengguna');
            console.error('Error:', error);
        }
    }

    function showValidationErrors(form, errors) {
        form.querySelectorAll('[data-error]').forEach(el => {
            el.textContent = '';
            el.classList.add('hidden');
        });

        Object.keys(errors).forEach(field => {
            const errorElement = form.querySelector(`[data-error="${field}"]`);
            if (errorElement) {
                errorElement.textContent = errors[field][0];
                errorElement.classList.remove('hidden');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const addUserForm = document.querySelector('#add_user_modal form');
        if (addUserForm) {
            addUserForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                fetch(this.action, {
                    method: 'POST',
                    body: new FormData(this),
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json().then(data => ({status: response.status, body: data})))
                .then(({status, body}) => {
                    if (status === 422) {
                        showValidationErrors(addUserForm, body.errors);
                        showValidationErrors(addUserForm, body.errors);
                        showMessage('error', 'Mohon periksa kembali input Anda');
                    } else if (body.success) {
                        showMessage('success', body.message);
                        close_modal('add_user_modal');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        showMessage('error', body.message || 'Terjadi kesalahan saat menambahkan pengguna');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showMessage('error', 'Terjadi kesalahan saat menambahkan pengguna');
                });
            });
        }
        
        const editForm = document.querySelector('#edit_user_modal form');
        if (editForm) {
            editForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                fetch(this.action, {
                    method: 'POST',
                    body: new FormData(this),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showMessage('success', 'Pengguna berhasil diperbarui');
                        close_modal('edit_user_modal');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        showMessage('error', data.message || 'Terjadi kesalahan saat memperbarui pengguna');
                    }
                })
                .catch(error => {
                    showMessage('error', 'Terjadi kesalahan saat memperbarui pengguna');
                    console.error('Error:', error);
                });
            });
        }
    });
</script>