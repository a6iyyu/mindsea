@component('components.admin.materials.modal', ['id' => $id, 'title' => $title])
    <form action="{{ isset($user) ? route('admin.users.update', $user) : route('admin.users.store') }}" method="POST" class="space-y-6">
        @csrf
        @if(isset($user)) @method('PUT') @endif

        <div class="space-y-4">
            <div>
                <label class="block text-sm text-gray-600">Nama</label>
                <input type="text" name="name" required value="{{ $user->name ?? old('name') }}"
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
            </div>

            <div>
                <label class="block text-sm text-gray-600">Email</label>
                <input type="email" name="email" required value="{{ $user->email ?? old('email') }}"
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
            </div>

            @if(!isset($user))
            <div>
                <label class="block text-sm text-gray-600">Password</label>
                <input type="password" name="password" required
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
            </div>
            @endif

            <div>
                <label class="block text-sm text-gray-600">Role</label>
                <select name="is_admin" required
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    <option value="0" {{ isset($user) && !$user->is_admin ? 'selected' : '' }}>User</option>
                    <option value="1" {{ isset($user) && $user->is_admin ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end gap-4">
            <button type="button" onclick="close_modal('{{ $id }}')"
                class="rounded-xl bg-gray-100 px-6 py-3 text-gray-700 hover:bg-gray-200">
                Batal
            </button>
            <button type="submit"
                class="rounded-xl bg-blue-500 px-6 py-3 text-white hover:bg-blue-600">
                {{ $submitText }}
            </button>
        </div>
    </form>
@endcomponent 