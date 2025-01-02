<section class="text-center pt-12 pb-6 lg:py-12">
  <i class="fas fa-lock mb-10 text-6xl text-orange-400 animate-bounce"></i>
  <h3 class="text-2xl font-bold text-gray-800 mb-2">
    Yuk Bergabung Bersama Kami!
  </h3>
  <h6 class="text-gray-600 mb-6 max-w-md mx-auto">
    Masuk untuk melihat progres belajarmu dan akses fitur-fitur menarik lainnya
  </h6>
  <div class="flex flex-col items-center justify-center gap-6 lg:flex-row">
    <a href="{{ route('login') }}"
      class="flex h-full w-full items-center justify-center px-6 py-3 bg-orange-500 text-white rounded-lg transition-all duration-300 transform ease-in-out hover:bg-orange-600 hover:scale-105 lg:w-fit">
      <i class="fas fa-sign-in-alt hidden mr-2 lg:inline"></i>
      <h5>Masuk</h5>
    </a>
    <a href="{{ route('register') }}"
      class="w-full flex items-center justify-center px-6 py-3 border-2 border-orange-500 text-orange-500 rounded-lg transition-all duration-300 transform hover:bg-orange-50 hover:scale-105 lg:w-fit">
      <i class="fas fa-user-plus hidden mr-2 lg:inline"></i>
      <h5>Daftar</h5>
    </a>
  </div>
</section>