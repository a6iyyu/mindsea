<section class="my-24 max-w-lg w-full p-8 bg-white rounded-2xl shadow-lg border-2 border-[#f58a66]/20">
  @if(session('error'))
    <h5 class="mb-4 p-4 rounded-lg bg-red-50 border text-sm text-red-500 border-red-500">
    {{ session('error') }}
    </h5>
  @endif

  <!-- Header -->
  <header class="text-center mb-8">
    <h1 class="text-xl font-bold text-[#3b3b3b] lg:text-3xl">
      Selamat Datang! 👋
    </h1>
    <p class="text-gray-600 mt-2">
      Masuk untuk melanjutkan petualangan belajarmu
    </p>
  </header>

  <!-- Form -->
  <form action="/login" method="POST" class="space-y-6">
    @csrf
    @if($errors->any())
    <ul class="mb-4 p-4 rounded-lg bg-red-50 border border-red-500 list-disc list-inside text-sm text-red-500">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  @endif
    <fieldset>
      <label for="email" class="block text-sm font-medium text-gray-700">
        Email
      </label>
      <input
        type="email"
        id="email"
        name="email"
        required
        placeholder="Masukkan email"
        class="mt-1 w-full px-4 py-3 bg-[#fceede]/30 border-2 border-[#f58a66]/20 rounded-xl shadow-sm focus:outline-none focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors"
      >
    </fieldset>
    <fieldset>
      <label for="password" class="block text-sm font-medium text-gray-700">
        Kata Sandi
      </label>
      <div class="relative">
        <input
          type="password"
          id="password"
          name="password"
          required
          placeholder="Masukkan kata sandi"
          class="mt-1 block w-full px-4 py-3 bg-[#fceede]/30 border-2 border-[#f58a66]/20 rounded-xl shadow-sm focus:outline-none focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors"
        >
        <i
          onclick="ShowPassword('password')"
          class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-600 hover:text-[#f58a66] focus:outline-none"
          id="password-icon"
        ></i>
      </div>
    </fieldset>

    <!-- Ingat saya dan lupa kata sandi -->
    <section class="flex items-center justify-between">
      <label class="flex items-center">
        <input type="checkbox" name="remember" class="h-4 w-4 text-[#f58a66] border-gray-300 rounded">
        <span class="ml-2 text-sm text-gray-700">Ingat Saya</span>
      </label>
      <a href="/lupa-password" class="text-sm text-[#f58a66] hover:text-[#f58a66]/80">Lupa Kata Sandi?</a>
    </section>
    <button type="submit"
      class="w-full py-3 px-4 bg-[#f58a66] text-white rounded-xl text-sm font-semibold shadow-md hover:bg-[#f58a66]/90 focus:outline-none focus:ring-2 focus:ring-[#f58a66]/50 transition-colors">
      Masuk
    </button>

    <!-- Footer -->
    <h5 class="text-center text-gray-600">
      Belum punya akun?
      <a href="/daftar" class="font-medium text-[#f58a66] hover:text-[#f58a66]/80 transition-colors">
        Daftar di sini
      </a>
    </h5>
  </form>

  <div class="mt-10 text-center">
    <hr class="border-gray-300">
    <span class="bg-white px-2 text-gray-500 relative -top-3">Atau</span>
    <a href="/auth/google"
      class="mt-4 flex items-center justify-center py-3 border border-gray-300 rounded-md shadow-sm font-medium transition-all duration-300 ease-in-out text-gray-700 bg-white hover:bg-gray-50">
      <i class="fab fa-google text-red-500 mr-2"></i> Google
    </a>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    window.ShowPassword = (input) => {
      const passwordInput = document.getElementById(input);
      const icon = document.getElementById(`${input}-icon`);

      if (passwordInput && icon) {
        if (passwordInput.type === "password") {
          passwordInput.type = "text";
          icon.classList.remove("fa-eye");
          icon.classList.add("fa-eye-slash");
        } else {
          passwordInput.type = "password";
          icon.classList.remove("fa-eye-slash");
          icon.classList.add("fa-eye");
        }
      }
    };
  });
</script>