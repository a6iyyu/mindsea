<form action="{{ $action }}" method="POST" class="space-y-6">
    @csrf
    @if($method ?? false)
        @method($method)
    @endif

    <!-- Name -->
    <div>
        <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Nama</label>
        <input type="text" 
               id="name" 
               name="name" 
               value="{{ old('name', $user->name ?? '') }}"
               required
               class="w-full px-4 py-3 rounded-lg border-2 border-[#f58a66]/20 focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors">
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Email -->
    <div>
        <label for="email" class="block text-lg font-medium text-gray-700 mb-2">Email</label>
        <input type="email" 
               id="email" 
               name="email" 
               value="{{ old('email', $user->email ?? '') }}"
               required
               class="w-full px-4 py-3 rounded-lg border-2 border-[#f58a66]/20 focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors">
        @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password -->
    <div>
        <label for="password" class="block text-lg font-medium text-gray-700 mb-2">
            {{ isset($user) ? 'Password Baru (kosongkan jika tidak ingin mengubah)' : 'Password' }}
        </label>
        <div class="relative">
            <input type="password" 
                   id="password" 
                   name="password" 
                   {{ !isset($user) ? 'required' : '' }}
                   class="w-full px-4 py-3 rounded-lg border-2 border-[#f58a66]/20 focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors">
            <i onclick="ShowPassword('password')"
               class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-600 hover:text-[#f58a66] focus:outline-none"
               id="password-icon"></i>
        </div>
        @error('password')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password Confirmation -->
    <div>
        <label for="password_confirmation" class="block text-lg font-medium text-gray-700 mb-2">Konfirmasi Password</label>
        <div class="relative">
            <input type="password" 
                   id="password_confirmation" 
                   name="password_confirmation" 
                   {{ !isset($user) ? 'required' : '' }}
                   class="w-full px-4 py-3 rounded-lg border-2 border-[#f58a66]/20 focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors">
            <i onclick="ShowPassword('password_confirmation')"
               class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-600 hover:text-[#f58a66] focus:outline-none"
               id="password_confirmation-icon"></i>
        </div>
    </div>

    <!-- Is Admin -->
    <div class="flex items-center gap-2">
        <input type="checkbox" 
               id="is_admin" 
               name="is_admin" 
               value="1"
               {{ old('is_admin', $user->is_admin ?? false) ? 'checked' : '' }}
               class="w-4 h-4 text-[#f58a66] border-gray-300 rounded focus:ring-[#f58a66]">
        <label for="is_admin" class="text-lg font-medium text-gray-700">Admin</label>
    </div>

    <!-- Buttons -->
    <div class="flex justify-end gap-4">
        <a href="{{ route('admin.users.index') }}" 
           class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
            Batal
        </a>
        <button type="submit"
                class="px-6 py-3 bg-[#f58a66] text-white rounded-lg hover:bg-[#f47951] transition-colors">
            {{ $submitText }}
        </button>
    </div>
</form>

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