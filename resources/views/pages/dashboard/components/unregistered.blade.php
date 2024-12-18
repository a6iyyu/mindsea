<section class="text-center py-12">
    <i class="fas fa-lock mb-10 text-6xl text-orange-400 animate-bounce"></i>
    <h3 class="text-2xl font-bold text-gray-800 mb-2">
        Yuk Bergabung Bersama Kami!
    </h3>
    <h6 class="text-gray-600 mb-6 max-w-md mx-auto">
        Masuk untuk melihat progres belajarmu dan akses fitur-fitur menarik lainnya
    </h6>
    <div class="flex items-center justify-center gap-6">
        <a href="{{ route('login') }}" class="flex items-center px-6 py-3 bg-orange-500 text-white rounded-lg transition-all duration-300 transform hover:bg-orange-600 hover:scale-105">
            <i class="fas fa-sign-in-alt mr-2"></i>
            <h5>Masuk Sekarang</h5>
        </a>
        <a href="{{ route('register') }}" class="flex items-center px-6 py-3 bg-white border-2 border-orange-500 text-orange-500 rounded-lg transition-all duration-300 transform hover:bg-orange-50 hover:scale-105">
            <i class="fas fa-user-plus mr-2"></i>
            <h5>Daftar</h5>
        </a>
    </div>
</section>