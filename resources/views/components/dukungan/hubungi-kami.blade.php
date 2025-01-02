<section class="bg-[#fceede]/30 rounded-xl p-6 border-4 border-[#f58a66]/20 lg:p-8">
  @php
    $categories = [
      [
      "ikon" => "fa-solid fa-envelope",
      "deskripsi" => "support@mindsea.com"
      ],
      [
      "ikon" => "fa-solid fa-phone",
      "deskripsi" => "+62 812 3456 7890"
      ],
      [
      "ikon" => "fa-brands fa-whatsapp",
      "deskripsi" => "Chat WhatsApp"
      ]
    ]
  @endphp
  <div class="text-center mb-8">
    <h2 class="text-2xl font-bold text-gray-800">Butuh Bantuan Lebih?</h2>
    <p class="text-gray-600 mt-2">Tim dukungan kami siap membantu Anda 24/7</p>
  </div>
  <nav class="grid grid-cols-3 gap-6">
    @foreach ($categories as $category)
    <a href="#" class="flex flex-col items-start gap-3 p-4 bg-white rounded-xl hover:shadow-md transition-all lg:flex-row lg:items-center lg:justify-center">
      <i class="{{ $category['ikon'] }} text-[#f58a66]"></i>
      <span class="hidden text-gray-700 lg:inline">{{ $category['deskripsi'] }}</span>
    </a>
  @endforeach
  </nav>
</section>