<div class="w-full max-w-lg p-8 bg-white rounded-2xl shadow-lg border-2 border-[#f58a66]/20">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-[#3b3b3b]">
            Selamat Datang! 👋
        </h1>
        <p class="text-gray-600 mt-2">
            Masuk untuk melanjutkan petualangan belajarmu
        </p>
    </div>

    <form action="/login" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email
            </label>
            <input type="email" id="email" name="email" required placeholder="Masukkan email"
                class="mt-1 block w-full px-4 py-3 bg-[#fceede]/30 border-2 border-[#f58a66]/20 rounded-xl shadow-sm focus:outline-none focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">
                Kata Sandi
            </label>
            <div class="relative">
                <input type="password" id="password" name="password" required placeholder="Masukkan kata sandi"
                    class="mt-1 block w-full px-4 py-3 bg-[#fceede]/30 border-2 border-[#f58a66]/20 rounded-xl shadow-sm focus:outline-none focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors">
                <button type="button" onclick="togglePassword('password')"
                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-600 hover:text-[#f58a66] focus:outline-none">
                    <i class="fa-solid fa-eye" id="password-icon"></i>
                </button>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember"
                    class="h-4 w-4 text-[#f58a66] focus:ring-[#f58a66] border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-700">
                    Ingat Saya
                </label>
            </div>
            <a href="/lupa-password" class="text-sm font-medium text-[#f58a66] hover:text-[#f58a66]/80 transition-colors">
                Lupa Kata Sandi?
            </a>
        </div>

        <button type="submit"
            class="w-full py-3 px-4 bg-[#f58a66] text-white rounded-xl text-sm font-semibold shadow-md hover:bg-[#f58a66]/90 focus:outline-none focus:ring-2 focus:ring-[#f58a66]/50 transition-colors">
            Masuk
        </button>

        <div class="text-center text-gray-600">
            <p>Belum punya akun?
                <a href="/daftar" class="font-medium text-[#f58a66] hover:text-[#f58a66]/80 transition-colors">
                    Daftar di sini
                </a>
            </p>
        </div>
    </form>
</div>
