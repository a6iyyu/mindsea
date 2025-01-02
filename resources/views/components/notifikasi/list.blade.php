<section class="space-y-4">
  @php
    $notifications = [
      [
      "type" => "info",
      "icon" => "fa-solid fa-circle-info",
      "color" => "blue",
      "title" => "Materi Baru Tersedia",
      "message" => "Materi baru 'Pengenalan Dasar Matematika' telah ditambahkan",
      "time" => "Baru saja"
      ],
      [
      "type" => "success",
      "icon" => "fa-solid fa-check-circle",
      "color" => "green",
      "title" => "Latihan Selesai",
      "message" => "Selamat! Anda telah menyelesaikan latihan 'Penjumlahan Dasar'",
      "time" => "5 menit yang lalu"
      ],
      [
      "type" => "warning",
      "icon" => "fa-solid fa-clock",
      "color" => "yellow",
      "title" => "Pengingat Belajar",
      "message" => "Jangan lupa untuk menyelesaikan materi 'Pengurangan Dasar' hari ini",
      "time" => "1 jam yang lalu"
      ],
      [
      "type" => "achievement",
      "icon" => "fa-solid fa-trophy",
      "color" => "amber",
      "title" => "Pencapaian Baru",
      "message" => "Anda mendapatkan lencana 'Pembelajar Aktif'",
      "time" => "2 jam yang lalu"
      ]
    ];
  @endphp

  <ul class="notification-list flex flex-col gap-4">
    @foreach($notifications as $notification)
    <li class="notification-item">
      <article class="flex flex-col items-start gap-4 rounded-xl border-2 p-6 shadow-sm hover:shadow-md border-{{ $notification['color'] }}-100 bg-{{ $notification['color'] }}-50 lg:flex-row">
        <figure class="rounded-full bg-{{ $notification['color'] }}-100 p-3">
          <i class="{{ $notification['icon'] }} text-{{ $notification['color'] }}-500 text-xl"></i>
        </figure>
        <div class="flex-1">
          <header class="flex flex-col items-start justify-between lg:items-center lg:flex-row">
          <h3 class="font-semibold text-lg text-gray-800">{{ $notification['title'] }}</h3>
          <time class="text-base text-gray-500">{{ $notification['time'] }}</time>
          </header>
          <p class="mt-4 text-gray-600">{{ $notification['message'] }}</p>
        </div>
      </article>
    </li>
  @endforeach
  </ul>


  <!-- Semisal Kosong -->
  @if(count($notifications) === 0)
    <div class="empty-state flex flex-col items-center justify-center py-12 text-center">
    <figure class="mb-4 rounded-full bg-gray-100 p-4">
      <i class="fa-solid fa-bell-slash text-3xl text-gray-400"></i>
    </figure>
    <h3 class="text-lg font-semibold text-gray-800">
      Tidak Ada Notifikasi
    </h3>
    <p class="mt-1 text-gray-600">
      Anda belum memiliki notifikasi baru
    </p>
    </div>
  @endif
</section>