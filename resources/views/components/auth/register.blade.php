<section class="my-24 max-w-lg w-full p-8 bg-white rounded-2xl shadow-lg border-2 border-[#f58a66]/20">
  <!-- Header -->
  <header class="text-center mb-8">
    <h2 class="text-xl font-bold text-[#3b3b3b] lg:text-3xl">
      Ayo Bergabung! 🎉
    </h2>
    <h5 class="text-gray-600 mt-2">
      Buat akun untuk memulai petualangan belajarmu
    </h5>
  </header>

  <!-- Form -->
  <form action="/register" method="POST" class="space-y-6">
    @csrf
    @if($errors->any())
    <ul class="mb-4 p-4 rounded-lg bg-red-50 border border-red-500 list-disc list-inside text-sm text-red-500">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  @endif
    <fieldset>
      <label for="nama" class="block text-sm font-medium text-gray-700">
        Nama Lengkap
      </label>
      <input
        type="text"
        id="nama"
        name="nama"
        required
        placeholder="Masukkan nama lengkap"
        class="mt-1 block w-full px-4 py-3 bg-[#fceede]/30 border-2 border-[#f58a66]/20 rounded-xl shadow-sm focus:outline-none focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors"
      >
    </fieldset>
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
        class="mt-1 block w-full px-4 py-3 bg-[#fceede]/30 border-2 border-[#f58a66]/20 rounded-xl shadow-sm focus:outline-none focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors"
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
          class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-600 hover:text-[#f58a66] focus:outline-none"
          id="password-icon"
          onclick="ShowPassword('password')"
        ></i>
      </div>
    </fieldset>
    <fieldset>
      <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
        Konfirmasi Kata Sandi
      </label>
      <div class="relative">
        <input
          type="password"
          id="password_confirmation"
          name="password_confirmation"
          required
          placeholder="Masukkan kata sandi"
          class="mt-1 block w-full px-4 py-3 bg-[#fceede]/30 border-2 border-[#f58a66]/20 rounded-xl shadow-sm focus:outline-none focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors"
        >
        <i
          onclick="ShowPassword('password_confirmation')"
          class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-600 hover:text-[#f58a66] focus:outline-none"
          id="password_confirmation-icon"
        ></i>
      </div>
    </fieldset>
    <button
      type="submit"
      class="w-full py-3 px-4 bg-[#f58a66] text-white rounded-xl text-sm font-semibold shadow-md hover:bg-[#f58a66]/90 focus:outline-none focus:ring-2 focus:ring-[#f58a66]/50 transition-colors"
    >
      Mulai Belajar
    </button>

    <!-- Footer -->
    <h5 class="text-center text-gray-600">
      Sudah punya akun?
      <a href="/masuk" class="font-medium text-[#f58a66] hover:text-[#f58a66]/80 transition-colors">
        Masuk di sini
      </a>
    </h5>
  </form>
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