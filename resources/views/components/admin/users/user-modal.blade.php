@component('components.admin.materials.modal', ['id' => $id, 'title' => $title])
    <form action="{{ $action }}" method="POST" class="space-y-6" id="{{ $id }}_form">
        @csrf
        @if($isEdit ?? false)
            @method('PUT')
        @endif

        <div class="space-y-4">
            <div>
                <label class="block text-sm text-gray-600">Nama</label>
                <input type="text" name="name" required 
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                <span class="text-sm text-red-600 hidden" data-error="name"></span>
            </div>

            <div>
                <label class="block text-sm text-gray-600">Email</label>
                <input type="email" name="email" required
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                <span class="text-sm text-red-600 hidden" data-error="email"></span>
            </div>

            <div>
                <label class="block text-sm text-gray-600">
                    {{ ($isEdit ?? false) ? 'Password Baru (Kosongkan jika tidak ingin mengubah)' : 'Password' }}
                </label>
                <div class="relative">
                    <input type="password" name="password" 
                        {{ !($isEdit ?? false) ? 'required' : '' }} 
                        minlength="8"
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    <i onclick="ShowPassword('{{ $id }}_password')"
                        class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-600 hover:text-[#f58a66] focus:outline-none"
                        id="{{ $id }}_password-icon"></i>
                </div>
                <span class="text-sm text-red-600 hidden" data-error="password"></span>
                <p class="mt-1 text-xs text-gray-500">Password minimal 8 karakter</p>
            </div>

            <div>
                <label class="block text-sm text-gray-600">Konfirmasi Password</label>
                <div class="relative">
                    <input type="password" name="password_confirmation" 
                        {{ !($isEdit ?? false) ? 'required' : '' }}
                        minlength="8"
                        class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    <i onclick="ShowPassword('{{ $id }}_password_confirmation')"
                        class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-600 hover:text-[#f58a66] focus:outline-none"
                        id="{{ $id }}_password_confirmation-icon"></i>
                </div>
            </div>

            <div>
                <label class="block text-sm text-gray-600">Role</label>
                <select name="is_admin" required
                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 p-3">
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                </select>
                <span class="text-sm text-red-600 hidden" data-error="is_admin"></span>
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

<script>
function ShowPassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(`${inputId}-icon`);
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>