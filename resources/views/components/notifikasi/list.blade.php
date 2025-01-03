<section class="space-y-4">
  @if(isset($notifications) && count($notifications) > 0)
    <div class="flex justify-end mb-4">
    <button onclick="markAllAsRead()" class="text-blue-500 hover:text-blue-700 flex items-center gap-2">
      <i class="fa-solid fa-check-double"></i>
      Tandai Semua Sudah Dibaca
    </button>
    </div>

    <ul class="notification-list flex flex-col gap-4">
    @foreach($notifications as $notification)
    <li class="notification-item" id="notification-{{ $notification->id }}">
      <article class="flex flex-col items-start gap-4 rounded-xl border-2 p-6 shadow-sm hover:shadow-md 
           border-{{ $notification->color }}-100 bg-{{ $notification->color }}-50 
           {{ $notification->is_read ? 'opacity-75' : '' }} lg:flex-row">
      <figure class="rounded-full bg-{{ $notification->color }}-100 p-3">
      <i class="{{ $notification->icon }} text-{{ $notification->color }}-500 text-xl"></i>
      </figure>
      <div class="flex-1">
      <header class="flex flex-col items-start justify-between lg:items-center lg:flex-row">
      <h3 class="font-semibold text-lg text-gray-800">{{ $notification->title }}</h3>
      <time class="text-base text-gray-500">{{ $notification->time_ago }}</time>
      </header>
      <p class="mt-4 text-gray-600">{{ $notification->message }}</p>
      </div>
      @if(!$notification->is_read)
      <button onclick="markAsRead({{ $notification->id }})"
      class="text-{{ $notification->color }}-500 hover:text-{{ $notification->color }}-700">
      <i class="fa-solid fa-check"></i>
      </button>
    @endif
      </article>
    </li>
  @endforeach
    </ul>
  @else
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

  <script>
    function markAsRead(id) {
      fetch(`/notifications/${id}/mark-as-read`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const notification = document.querySelector(`#notification-${id}`);
          notification.querySelector('article').classList.add('opacity-75');
          notification.querySelector('button').remove();
        }
      })
    }

    function markAllAsRead() {
      fetch('/notifications/mark-all-as-read', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          document.querySelectorAll('.notification-item').forEach(button => button.remove());
          document.querySelectorAll('.notification-item article').forEach(article => {
            article.classList.add('opacity-75');
          })
        }
      })
    }
  </script>
</section>